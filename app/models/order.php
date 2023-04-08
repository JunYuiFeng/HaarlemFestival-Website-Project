<?php

class Order 
{
    private $id;
    private $userId;
    private $date;
    private $status;
    private $invoiceNr;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id 
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of invoiceNr
     */ 
    public function getInvoiceNr()
    {
        return $this->invoiceNr;
    }

    /**
     * Set the value of invoiceNr
     *
     * @return  self
     */ 
    public function setInvoiceNr($invoiceNr)
    {
        $this->invoiceNr = $invoiceNr;

        return $this;
    }
}
