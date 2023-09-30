<?php

/**set side bar item active */

function setActive(array $route)
{
  if (is_array($route)) {
    foreach ($route as $r) {
      if (request()->routeIs($r)) {
        return 'active';
      }
    }
  }
}



/** CHECK IF THE PRODUT HAVE A DISCOUNT */
function checkDiscount($product)
{
  $currentDate = date('Y-m-d');
  if ($product->offer_price > 0 && $product->offer_price < $product->price && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
    return true;
  }
  return false;
}

/** CALCULATE THE PERCENTAGE OF THE PRODUCT FLASH SALE  */

function calculatDiscountPercentage($originalPrice, $offerPrice)
{
  $discountAmmount = $originalPrice - $offerPrice;
  $percentageAmmount = round(($discountAmmount / $originalPrice) * 100);
  return $percentageAmmount;
}


/**CHECK TEH PRODUCT TYPE  */

function productType($type): string
{
  switch ($type) {
    case 'new_arrival':
      return "New";
      break;
    case 'featured_product':
      return "Featured";
      break;
    case 'best_product':
      return "Best";
      break;
    case 'top_product':
      return "Top";
      break;

    default:
      return "";
      break;
  }
}

function calcSubTotalProduct()
{
  $total = 0;
  foreach (\Cart::content() as $product) {
    $total = ($product->price + $product->options->Variant_total) * $product->qty;
  }
  return $total;
}
