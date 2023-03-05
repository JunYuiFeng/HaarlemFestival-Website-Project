<?php
class Restaurant 
{
    private int $id;
    private string $name;
    private string $cuisine;
    private string $foodType;
    private float $sessionDuration;
    private int $priceIndicator;
    private ?float $priceAge12AndUnder;
    private float $rating;
    private bool $hasMichelin;
    private bool $isFestival;
    private ?float $priceAboveAge12;
    private int $phoneNumber;
    private string $address;
    private ?int $seats;
    private ?string $website;
    private string $coverImg;
    private string $description;

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
     * Get the value of cuisine
     */ 
    public function getCuisine()
    {
        return $this->cuisine;
    }

    /**
     * Set the value of cuisine
     *
     * @return  self
     */ 
    public function setCuisine($cuisine)
    {
        $this->cuisine = $cuisine;

        return $this;
    }

    /**
     * Get the value of foodType
     */ 
    public function getFoodType()
    {
        return $this->foodType;
    }

    /**
     * Set the value of foodType
     *
     * @return  self
     */ 
    public function setFoodType($foodType)
    {
        $this->foodType = $foodType;

        return $this;
    }

    /**
     * Get the value of sessionDuration
     */ 
    public function getSessionDuration()
    {
        return $this->sessionDuration;
    }

    /**
     * Set the value of sessionDuration
     *
     * @return  self
     */ 
    public function setSessionDuration($sessionDuration)
    {
        $this->sessionDuration = $sessionDuration;

        return $this;
    }

    /**
     * Get the value of priceIndicator
     */ 
    public function getPriceIndicator()
    {
        return $this->priceIndicator;
    }

    /**
     * Set the value of priceIndicator
     *
     * @return  self
     */ 
    public function setPriceIndicator($priceIndicator)
    {
        $this->priceIndicator = $priceIndicator;

        return $this;
    }

    /**
     * Get the value of priceAge12AndUnder
     */ 
    public function getPriceAge12AndUnder()
    {
        return $this->priceAge12AndUnder;
    }

    /**
     * Set the value of priceAge12AndUnder
     *
     * @return  self
     */ 
    public function setPriceAge12AndUnder($priceAge12AndUnder)
    {
        $this->priceAge12AndUnder = $priceAge12AndUnder;

        return $this;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of hasMichelin
     */ 
    public function getHasMichelin()
    {
        return $this->hasMichelin;
    }

    /**
     * Set the value of hasMichelin
     *
     * @return  self
     */ 
    public function setHasMichelin($hasMichelin)
    {
        $this->hasMichelin = $hasMichelin;

        return $this;
    }

    /**
     * Get the value of isFestival
     */ 
    public function getIsFestival()
    {
        return $this->isFestival;
    }

    /**
     * Set the value of isFestival
     *
     * @return  self
     */ 
    public function setIsFestival($isFestival)
    {
        $this->isFestival = $isFestival;

        return $this;
    }

    /**
     * Get the value of priceAboveAge12
     */ 
    public function getPriceAboveAge12()
    {
        return $this->priceAboveAge12;
    }

    /**
     * Set the value of priceAboveAge12
     *
     * @return  self
     */ 
    public function setPriceAboveAge12($priceAboveAge12)
    {
        $this->priceAboveAge12 = $priceAboveAge12;

        return $this;
    }

    /**
     * Get the value of phoneNumber
     */ 
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */ 
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of seats
     */ 
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Set the value of seats
     *
     * @return  self
     */ 
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * Get the value of website
     */ 
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set the value of website
     *
     * @return  self
     */ 
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get the value of coverImg
     */ 
    public function getCoverImg()
    {
        return $this->coverImg;
    }

    /**
     * Set the value of coverImg
     *
     * @return  self
     */ 
    public function setCoverImg($coverImg)
    {
        $this->coverImg = $coverImg;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}