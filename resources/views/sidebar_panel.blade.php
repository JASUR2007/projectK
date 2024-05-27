<div id="container">


 <nav id="column-left-fix" class="sidebar_main" style="padding-top:5px ;">  
  <ul id="menu" class="sidebar_ul">
    <li id="menu-dashboard">
      <a href="#/">
        <i class="fa fa-dashboard fw"></i> 
        <span>Панель состояния</span>
      </a>     
    </li>
    <li id="menu-catalog">
     <a class="parent">
      <i class="fa fa-tags fw"></i>
         <span>Каталог</span>
      </a>      
      <ul style="margin-left:-15px;">
        <li>    
          <a href="#admin_group" @click="localstorage">Подгруппа</a>
        </li>
        <li>       
          <a href="#admin_type" @click="localstorage">Товары</a>
       </li>
        <!-- <li>
          <a href="">Производители</a>              
        </li> -->
        <li>
          <a href="#admin_feedback" @click="localstorage">Комменты</a>
        </li>
        <li>
          <a href="#currency">Валюта</a>          
        </li> 
      </ul>
    </li>
    <li id="menu-design">
      <a class="parent">
        <i class="fa fa-television fw"></i> 
        <span>Дизайн</span>
      </a>
      <ul class="collapse" style="margin-left:-15px;">
        <li>
          <a href="#banner" @click="localstorage">Баннеры</a>
        </li>
      </ul>
    </li>
    <li id="menu-dashboard">
      <a href="#admin_message" @click="localstorage">
        <i class="fa-solid fa-comment"></i>
        <span>Отзывы</span>
      </a>     
    </li>
</nav>