<?php

class Pagination {
    public $totalArticles = 0;
    public $articlesPerPage = 5;
    public $howManyPages;
    public $articlesArray = Array();

    function __construct($connection){
        //how many articles are
        $this->totalArticles = mysqli_query($connection, "SELECT * FROM `articles`")->num_rows;
        //how many pages will be
        $this->howManyPages = ceil($this->totalArticles/$this->articlesPerPage);
    }

    public function paginationArticle($start, $end, $connection){
        $articlesTemp = mysqli_query($connection, "SElECT * FROM `articles` WHERE `id` > $start ORDER BY `id` LIMIT $end");
        while($tempArticle = mysqli_fetch_assoc($articlesTemp)){
            array_push($this->articlesArray, $tempArticle);
        }
    }

}