<?php
class Reservation 
{
    private int $id;
    private int $restaurantId;
    private int $sessionId;
    private int $amountAbove12;
    private int $amountUnderOr12;
    private string $date;
    private string $comments;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of restaurantId
     */ 
    public function getRestaurantId()
    {
        return $this->restaurantId;
    }

    /**
     * Set the value of restaurantId
     *
     * @return  self
     */ 
    public function setRestaurantId($restaurantId)
    {
        $this->restaurantId = $restaurantId;

        return $this;
    }

    /**
     * Get the value of sessionId
     */ 
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set the value of sessionId
     *
     * @return  self
     */ 
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get the value of amountAbove12
     */ 
    public function getAmountAbove12()
    {
        return $this->amountAbove12;
    }

    /**
     * Set the value of amountAbove12
     *
     * @return  self
     */ 
    public function setAmountAbove12($amountAbove12)
    {
        $this->amountAbove12 = $amountAbove12;

        return $this;
    }

    /**
     * Get the value of amountUnderOr12
     */ 
    public function getAmountUnderOr12()
    {
        return $this->amountUnderOr12;
    }

    /**
     * Set the value of amountUnderOr12
     *
     * @return  self
     */ 
    public function setAmountUnderOr12($amountUnderOr12)
    {
        $this->amountUnderOr12 = $amountUnderOr12;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of comments
     */ 
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set the value of comments
     *
     * @return  self
     */ 
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }
}