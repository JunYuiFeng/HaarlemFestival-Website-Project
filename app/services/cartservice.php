<?php
class CartService 
{
    public function addToCart($id, $quantity) 
    {
        $cart = array();

        if(isset($_SESSION["cart"])) 
        {
            $cart = $_SESSION["cart"];
        }

        if (in_array($id, array_keys($cart))) 
        {
            $cart[$id] += $quantity;
        } 
        else 
        {
            $cart[$id] = $quantity;
        }

        $_SESSION["cart"] = $cart;
    }

    public function removeFromCart($id)
    {
        $cart=array();

        if(isset($_SESSION["cart"]))
        {
            $cart=$_SESSION["cart"];
        }

        if(in_array($id, array_keys($cart)))
        {
            unset($cart[$id]);
        }

        $_SESSION["cart"] = $cart;
    }

    public function decrease($id)
    {
        $cart = array();

        if(isset($_SESSION["cart"]))
        {
            $cart = $_SESSION["cart"];
        }

        if (in_array($id, array_keys($cart)))
        {
            if($cart[$id]  - 1 > 0)
            {
                $cart[$id]  -= 1;
            }
            else
            {
                unset($cart[$id] );
            }

            $_SESSION["cart"] = $cart;
        }
    }

    public function increase($id)
    {
        $cart=array();

        if(isset($_SESSION["cart"]))
        {
            $cart=$_SESSION["cart"];
        }
        if(in_array($id, array_keys($cart)))
        {
            $cart[$id] += 1;
        }

        $_SESSION["cart"] = $cart;
    }

    public function getCartAmount()
    {
        $cart = array();
        $count = 0;

        if(isset($_SESSION["cart"]))
        {
            $cart = $_SESSION["cart"];
        }

        foreach($cart as $item => $value)
        {
            $count+=$value;
        }

        return $count;
    }

    public function getItemAmount($id)
    {
        $cart = array();

        if(isset($_SESSION["cart"]))
        {
            $cart = $_SESSION["cart"];
        }

        foreach($cart as $item_id => $value)
        {
            if($id == $item_id)
            {
                $count = $value;
            }
        }

        return $count;
    }
}