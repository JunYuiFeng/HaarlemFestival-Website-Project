<?php
class TicketToken
{
    /**
     * Id primary key
     * @var int $id
     */
    private $id;

    /**  
     * Token Unique key 
     * @var string $token 
     */
    private $token;

    /**  
     * OrderId Foreign key
     * @var int $orderId 
     */
    private $orderId;

    /**  
     * IsUsed Boolean
     * @var bool $isUsed 
     */
    private $isUsed;


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
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get the value of orderId
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * Get the value of isUsed
     */
    public function getIsUsed()
    {
        return $this->isUsed;
    }

    /**
     * Set the value of isUsed
     *
     * @return  self
     */
    public function setIsUsed($isUsed)
    {
        $this->isUsed = $isUsed;
        return $this;
    }
}
