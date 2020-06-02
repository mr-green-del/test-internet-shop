<?php

    /**
     * Класс для генерации пагинации, может работать отдельно от других компонентов
     */
    class Pagination
    {

        public function __construct($currentPage, $limit, $path, $numDisplayedLinks, $total)
        {
            $this->total             = $total;
            $this->currentPage       = $currentPage;
            $this->limit             = $limit;
            $this->path              = $path;
            $this->numDisplayedLinks = $numDisplayedLinks;
        }

        /**
         * Функция возращающая сгенерированный html код
         *
         * @return string
         */
        public function getHtml()
        {
            //Путь в ссылках
            $path = "$this->path";


            //Переменная с колличеством страниц
            $numPages = $this->countNumOfPages();

            //Если введена страница больше существующей, то перекинет на последнюю страницу
            if($this->currentPage > $numPages && $numPages != 0)
            {
                header("Location: $path$numPages");
                exit;
            }

            //Проверка на первую и последнюю страницу для отображения стрелок
            $prevArrow = $this->generateArrow( 1,$this->currentPage - 1, "<", $path);
            $nextArrow = $this->generateArrow($numPages,   $this->currentPage + 1, ">", $path);

            $arrows = [
                'prev' => $prevArrow,
                'next' => $nextArrow,
            ];


            //Раасчитываем первую и последнюю видимую ссылку
            $displayedLinks = $this->countDisplayedLinks($this->numDisplayedLinks, $numPages, $this->currentPage);

            //Переменная в которой будет весь html код
            $generatedHtml  = $this->generateHtml($arrows, $displayedLinks, $path, $numPages);

            return $generatedHtml;
        }

        /**
         * Функция для генерации html кода пагинации
         *
         * @param $arrows - массив с первой и последней стрелкой
         * @param $displayedLinks - кол-во отображаемых ссылок
         * @param $path - путь для ссылок
         * @param $numPages - общее кол-во страниц
         * @return string - весь html код с ссылками
         */
        private function generateHtml($arrows, $displayedLinks, $path, $numPages)
        {
            if($this->currentPage > $numPages) return '';

            $generatedHtml  = "<ul class=\"pagination\">";
            $generatedHtml .= $arrows['prev'];

            for($i = $displayedLinks['first']; $i <= $displayedLinks['last']; $i++)
            {
                //подсвечиваем текущие ссылки
                if($this->currentPage == $i)
                {
                    $generatedHtml .= "<li class=\"active\"><a href=\"$path"."$i\">$i</a></li>";
                }
                else
                {
                    $generatedHtml .= "<li class=\"\"><a href=\"$path"."$i\">$i</a></li>";
                }
            }

            $generatedHtml .= $arrows['next'];
            $generatedHtml .= "</ul>";

            return $generatedHtml;
        }

        /**
         * Функция для подсчета номера первой и последней отображаемой ссылок
         *
         * @param $numOfDisplayedLinks - кол-во отображаемых ссылок
         * @param $numPages - общее кол-во страниц
         * @param $currentLink - текущая страница
         * @return array
         */
        private function countDisplayedLinks($numOfDisplayedLinks, $numPages, $currentLink)
        {

            // считаем кол-во секций с ссылками
            $allDisplayedLinks = ceil($numPages/($numOfDisplayedLinks));

            // вычисляем текущую секцию с ссылками
            $currentSection    = ceil($currentLink/($numOfDisplayedLinks));

            for($i = 1; $i <= $allDisplayedLinks; $i++)
            {

                if($currentSection == $i && $currentSection <= $allDisplayedLinks)
                {
                    $currentLinks       = $i;
                    $firstDisplayedLink = ($i - 1)*$numOfDisplayedLinks + 1;
                    $lastDisplayedLink  = $i*$numOfDisplayedLinks;


                    if($currentLinks == 1)
                    {
                        $firstDisplayedLink = 1;
                        $lastDisplayedLink  = ($lastDisplayedLink >= $numPages )? $numPages: $lastDisplayedLink;
                    }

                    if($currentLinks == $allDisplayedLinks)
                    {
                        $firstDisplayedLink = ($firstDisplayedLink <= 1 )? 1: $firstDisplayedLink;
                        $lastDisplayedLink  = $numPages;
                    }

                    return array(
                        'first' => $firstDisplayedLink,
                        'last'  => $lastDisplayedLink,
                    );
                }
            }

        }

        /**
         * Функция для генерации html кода стрелок переключения
         *
         * @param $firstOrLastPage - номер первой страницы
         * @param $prevOrNextPage - номер последней страницы
         * @param $char - символ внутри стрелки
         * @param $path - ссылка на которую будут вести стрелки
         * @return string - возвращает html код стрелки
         */
        private  function generateArrow($firstOrLastPage, $prevOrNextPage, $char, $path)
        {
            $arrow = "";

            if ($this->currentPage != $firstOrLastPage && $this->total != 0)
            {
                $arrow = "<li><a href=\"$path" . "$prevOrNextPage\"> $char </a></li>";
            }

            return $arrow;
        }

        /**
         * Функция которая считает общее кол-во страниц с учетом
         * общего кол-ва записей и лимита на отображение записей
         *
         * @return float
         */
        private function countNumOfPages()
        {
            return ceil($this->total/$this->limit);
        }


    }

?>