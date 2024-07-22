<?php   

echo "<pre>";

interface Loanable {
    public function loan();
    public function returnFromLoan();
}

class Store {
    private $articles;
    private $balance;
    public function __construct()
    {
        $this->articles = [];
        $this->balance = 0;
    }
    public function addArticle(Article $article)
    {
        array_push($this->articles, $article);
    }
    public function sellArticle(Article $article)
    {
        if (!in_array($article, $this->articles)) {
            echo "We don't sell this article.";
            return;
        }
        if ($article->getStockStatus() === 0) {
            echo "Currently we don't have this article on stock.";
            return;
        }
        $this->balance += $article->getPrice();
        $currentStockStatus = $article->getStockStatus();
        $article->setStockStatus($currentStockStatus - 1);
    }
    public function loanArticle(Article $article)
    {
        if (!($article instanceof Loanable)) {
            echo "We don't have this article for loaning.";
            return;
        }
        if ($article->getStockStatus() === 0) {
            echo "We don't have this article on stock.";
            return;
        }
        $article->loan();
        $this->balance += $article->getPrice() * 0.25;
    }
}

class Article {
    protected $serialNumber;
    protected $producer;
    protected $model;
    protected $price;
    protected $stockStatus;
    public function __construct($serialNumber, $producer, $model, $price)
    {
        $this->serialNumber = $serialNumber;
        $this->producer = $producer;
        $this->model = $model;
        $this->price = $price;
        $this->stockStatus = 0;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getStockStatus()
    {
        return $this->stockStatus;
    }
    public function setStockStatus($newStockStatus)
    {
        $this->stockStatus = $newStockStatus;
    }
}

class Ram extends Article {
    private $capacity;
    private $frequency;
    public function __construct($serialNumber, $producer, $model, $price, $capacity, $frequency)
    {
        parent::__construct($serialNumber, $producer, $model, $price);
        $this->capacity = $capacity;
        $this->frequency = $frequency;
    }
}

class Cdu extends Article {
    private $numberOfCores;
    private $frequency;
    public function __construct($serialNumber, $producer, $model, $price, $numberOfCores, $frequency)
    {
        parent::__construct($serialNumber, $producer, $model, $price);
        $this->numberOfCores = $numberOfCores; 
        $this->frequency = $frequency;
    }
}

class Hdd extends Article implements Loanable {
    private $capacity;
    public function __construct($serialNumber, $producer, $model, $price, $capacity)
    {
        parent::__construct($serialNumber, $producer, $model, $price);
        $this->capacity = $capacity;
    }
    public function loan()
    {
        $this->stockStatus -= 1;
    }
    public function returnFromLoan()
    {
        $this->stockStatus += 1;
    }
}

class Gpu extends Article {
    private $frequency;
    public function __construct($serialNumber, $producer, $model, $price, $frequency)
    {
        parent::__construct($serialNumber, $producer, $model, $price);
        $this->frequency = $frequency;
    }
}

// $hdd1 = new Hdd("B00001", "IBM", "i3", 400, "4GB");
// $gpu1 = new Gpu("A00004", "Intel", "i9", 200, "16GHZ");
// $gpu2 = new Gpu("A00008", "Intel", "i5", 300, "8GHZ");
// $gpu1->setStockStatus(8);
// $hdd1->setStockStatus(5);
// $store = new Store();
// $store->addArticle($hdd1);
// $store->addArticle($gpu1);
// $store->loanArticle($gpu1);
// var_dump($store);



echo "</pre>";

?>