<?php
class Ticket
{
    private $id;
    private $date;
    private $time;
    private $venue;
    private $artist;
    private $session;
    private $duration;
    private $ticketAvailable;
    private $price;
    private $quantity;

    public function getId()
    {
        return $this->id;
    }

    public function getDay()
    {
        $dayOfWeek = date('l', strtotime($this->date));
        return $dayOfWeek;
    }

    public function getDate()
    {
        $this->date = date("d-m-Y", strtotime($this->date));
        return $this->date;
    }

    public function getTime()
    {
        $this->time = date("h:i A", strtotime($this->time));
        return $this->time;
    }

    public function getVenue()
    {
        return $this->venue;
    }
    
    public function getArtist()
    {
        return $this->artist;
    }

    public function getSession()
    {
        return $this->session;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getAvaliableTickets()
    {
        return $this->ticketAvailable;
    }

    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}


?>