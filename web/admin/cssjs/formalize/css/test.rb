class LearnController < ApplicationController   
  def another_action   
    text   
  end  
  
  def text   
    @text = 'Acest text provine dintr-o alta actiune' 
  end  
  end


 
<html>  
  <head>  
  <title>Actiune Demo</title>  
  </head>  
<body>  
       
  <%= @text %>  
  </body>  
  </html>
