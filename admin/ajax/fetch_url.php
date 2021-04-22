<?php   declare (strict_types = 1); include "../../conn/conn.php";
        if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
            $usr_code = $_SESSION["User_code"];
        } else {
            $usr_code = 0;
        }
        if (checksess("usr_type", "admin")) {
                $whereST = "";
                $hideUsrDDL = "0";
            } else {
                $whereST = " and cat_user_id = '" . USER_CODE . "'";
                $hideUsrDDL = "1";
            }
 if(isset($_POST["p_urlV"]) && !empty($_POST["p_urlV"])){
        extract($_POST);
        $parse = parse_url($p_urlV);
        $domain_name = $parse['host'];
         $expDomain = explode(".",$domain_name);
         $host_domainname = $expDomain[1];
    if($insmoad == 1 ){
       if(isset($_POST["p_urlV"])){
                $url = "https://api.kit.co/availabilities/from_url?url=".$_POST["p_urlV"];
                $ch = curl_init();
                $timeout = 30;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HEADER, false); // we want headers
                curl_setopt($ch, CURLOPT_NOBODY, false); // we don't need body
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                $dom = curl_exec($ch) ;
                $json = json_decode($dom);
                curl_close($ch);
             if(!empty($json)){

                if($json->product->brand->name !='') 
                    $brand = $json->product->brand->name ; 
                else
                    $brand = $json->product->brand;
               $insmoad = 1 ;     
               $p_name = $json->product->name;     
               $p_productCategory = $json->product->p_productCategory;
               $p_model  = $json->product->p_model;
               $manufacturerUrl = $json->product->manufacturerUrl;
               $description = $json->product->description;
               $price = $json->price;
               $priceCurrencyCode = $json->priceCurrencyCode;
               $p_url = "";
            }
          } 
        } 
          elseif(!empty($curr_code))
            {
                 $insmoad = 0 ;
                
                    
                    $p_name = $p_name;
                    $brand = $p_brand;
                    $p_productCategory = $p_productCategory;
                    $p_model = $p_model;
                    $manufacturerUrl = $p_manufacturerUrl;
                    $description = $p_description;
                    $price = $price;
                    $priceCurrencyCode = $priceCurrencyCode;
                    $p_url = $p_url;
   
            }     
        else
         echo "-1╩"."The url incorrect please try another one ";
         
         echo '1╩';
                   echo '<div class="form-group col-md-6">
                        <label for="p_name">Product Title</label>
                        <input type="text" class="form-control" id="p_name" value="'.$p_name.'" name="p_name" placeholder="Product Title" dir="ltr">
                        <input type="hidden" name="" id="priceCurrencyCode" value="'.$priceCurrencyCode.'" />
                        
                        <input type="hidden" name="p_domain_name" id="p_domain_name" value="'.strtoupper($host_domainname).'" />
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_brand">Brand</label>
                        <input type="text" class="form-control" id="p_brand" value="'.$brand.'" name="p_brand" placeholder="Product Title" dir="ltr">
                    </div>
                    <div class="form-group col-md-6">
                         <label for="p_name">Price</label>
                        <input type="text" class="form-control" placeholder="ex: 25$" name="price" id="price" value="'.$price.'" />
                    </div>
                    <div class="form-group col-md-6">
                         <label for="p_name"> Currency Code</label>
                        <select  class="form-control"   name="priceCurrencyCode" id="priceCurrencyCodes">
                            <option value="">None</option>
                            <option value="usd">USD</option>
                            <option value="gbp">GBP</option>
                            <option value="eur">EUR</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_productCategory"> Product Category</label>
                        <input type="text" class="form-control" id="p_productCategory" value="'.$p_productCategory.'" name="p_productCategory" placeholder="Product Category" dir="ltr">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_model">Model</label>
                        <input type="text" class="form-control" id="p_model" value="'.$p_model.'" name="p_model" placeholder="Product Model" dir="ltr">
                    </div>';
                    if($insmoad == 1) // when you insert product fire the loop to fetch all product photos 
                    {
                        for($i=0;$i<=count($json->product->images)-1;$i++)
                        {
                            $onePh = $json->product->images[$i];
                            $visionCount = $i+1;
                            echo' <div class="form-group col-md-4">
                                    <a class="d-flex align-items-center text-muted Del_photo" href="#">
                                        <span data-feather="delete"><b style="font-size:20px">X</b></span>
                                    </a>
                                        <label for="p_brand">Pic'.$visionCount.'</label>
                                        <a href="'.$onePh->url.'" data-lightbox="'.$onePh->url.'">
                                            <img src="'.$onePh->url.'" width="200" height="200" /> 
                                        </a>
                                        <input type="hidden"  id="ph_url'.$i.'" value="'.$onePh->url.'╦'.$onePh->width.'╦'.$onePh->height.'╦'.$onePh->mime_type.'" name="ph_url[]">
                                    </div>';
                        } 
                    }
                echo '<input type="hidden" name="p_manufacturerUrl" id="p_manufacturerUrl" value="'.$manufacturerUrl.'" />
                    <div class="form-group col-md-12">
                        <label for="p_description">Description</label>
                        <textarea  class="form-control" id="p_description" name="p_description" placeholder="Product Description" dir="ltr">'.$description.'</textarea>
                    </div>           
                ';
            }
            else{
                echo "-1╩" ;
                return false;
            }
    ?>