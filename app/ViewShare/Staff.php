<?php
/**
 * Date: 23-Aug-16
 * Time: 01:52 PM
 */

namespace App\ViewShare;
defined('CC') or DIE('no direct access');

use App\Http\Requests\AppRequest;
use Illuminate\Routing\Route;
use App\Helpers\Filter;


class Staff
{
  private $_controller;
  private $_action;

  private $_searchFilters;
  private $_searchKeys;

  public function __construct(Route $route, AppRequest $request , $controller = null, $action = null)
  {
    if(!is_null($controller))
      $this->setController($controller);
    if(!is_null($action))
      $this->setAction($action);

  }

  public function setController($controller){
    $this->_controller = $controller;
  }
  public function setAction($action){
    $this->_action = $action;

  }
  public function share(){
    if($this->_action=='index' || $this->_action=='export'){
      //share search filter and search keys for staff
      $searchFilter = array();
      $filterText = Filter::apply(app('request')->input('text'),'search');
      $searchKeys = null;
      if($filterText){
        $searchFilter['text'] = $filterText;
        $searchText = explode(' ',$filterText);
        $searchTexts = '(';
        foreach($searchText as $k=>$v){
          $searchTexts .= " name like '%".$v."%' or last_name like '%".$v."%' or ";
        }
        $searchTexts = substr($searchTexts,0, -3);
        $searchTexts .= ') ';
        $searchKeys[] = $searchTexts;
      }

      if(!is_null($searchKeys))
        $searchKeys = implode(' AND ',$searchKeys);

      $this->_searchFilters = $searchFilter;
      $this->_searchKeys = $searchKeys;

      view()->share('searchFilters',$searchFilter);
      view()->share('searchKeys',$searchKeys);
    }



  }

  public function getFilters(){
    return $this->_searchFilters;
  }
  public function getFilterKeys(){
    return $this->_searchKeys;
  }



}