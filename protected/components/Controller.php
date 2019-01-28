<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	public $menuUser=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public function beforeAction($action)
	{
		if (!Yii::app()->user->isGuest) {
			$this->menuUser = $this->generateMenu();
		}
		return true;
	}

	protected function generateMenu()
	{
		$groups = GroupUser::model()->findAllByAttributes(['username'=>Yii::app()->user->name]);
		$listMenu = [];
		foreach ($groups as $group) {
			$tempMenu = $this->generateListItem($group);
			$listMenu = array_merge($listMenu,$tempMenu);
		}

		return $listMenu;
	}

	protected function generateListItem($group)
	{
		$groupMenuParent = MenuGroup::model()
									->with('idMenu')
									->findAllByAttributes(
											['group_user'=>$group->group_id],
											['condition'=>'idMenu.parent IS NULL AND idMenu.is_active = 1']
										);
		foreach ($groupMenuParent as $value) {
			$groupMenuChild = MenuGroup::model()
										->with('idMenu')
										->findAllByAttributes(
												['group_user'=>$group->group_id],
												['condition'=>'idMenu.parent IS NOT NULL AND idMenu.is_active = 1 AND idMenu.parent = :menu',
													'params' => [':menu'=>$value->id_menu]
												]
											);
			$itemChild = [];
			if(count($groupMenuChild)>0){
				foreach($groupMenuChild as $value_c){
					$itemChild[] = ['label'=>$value_c->idMenu->label, 'url'=>[$value_c->idMenu->url]];
				}
				$listItem[] = array(
						'label' => "<i class='menu-icon fa {$value->idMenu->menu_icon}'></i>
													<span class='menu-text'> {$value->idMenu->label} </span>
													<b class='arrow fa fa-angle-down'></b>",
						'url'=>['#'],
						'linkOptions'=>['class'=>'dropdown-toggle'],
						'items'=>$itemChild
				);
			}else{
				$listItem[] = [
									'label'=>"<i class='menu-icon fa {$value->idMenu->menu_icon}'></i>
											<span class='menu-text'> {$value->idMenu->label} </span>",
									'url'=>[$value->idMenu->url]];
			}

		}
		return $listItem;
	}
}
