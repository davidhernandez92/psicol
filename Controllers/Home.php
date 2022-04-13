<?php

class Home extends Controllers
{
  public function __construct()
  {
    parent::__construct();
  }

  public function home()
  {
    $data['page_id'] = 1;
    $data['page_tag'] = "Sistema Reservas - Psicol";
    $data['page_title'] = "HOME";
    $data['page_name'] = "home";
    $data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus voluptas omnis quis, sed aspernatur officia eum. Autem ab ipsa minus.";
    $this->views->getView($this, "home", $data);
  }
}
