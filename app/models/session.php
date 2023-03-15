<?php
class Session 
{
    private int $id;
    private string $name;
    private $startTime;
    private int $restaurantId;
    private $endTime;

    

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

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
     * Get the value of startTime
     */ 
    public function getStartTime()
    {
        return  new DateTime($this->startTime);
    }

    /**
     * Set the value of startTime
     *
     * @return  self
     */ 
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get the value of endTime
     */ 
    public function getEndTime()
    {
        return new DateTime($this->endTime);
    }

    /**
     * Set the value of endTime
     *
     * @return  self
     */ 
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }
}