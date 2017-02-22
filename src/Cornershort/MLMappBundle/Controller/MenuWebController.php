<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class MenuWebController extends Controller {

    public function listChildrenAction() {

        $SQLHelper = $this->get('cornershort_sql_helper.api');

        $params = array();
        $sql = "SELECT menu_child.*,menu_parent.name as parent_name,menu_parent.icon as parent_icon FROM menu_child,menu_parent WHERE menu_parent.id=menu_child.menu_parent_id ORDER BY menu_parent.sort_id ASC,menu_child.name ASC;";
        $menu_child_rows = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:Menu:list_menu_children.html.php', array('menu_child_rows' => $menu_child_rows));
    }

    public function viewChildAction($id) {

        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $request = $this->container->get('request_stack')->getCurrentRequest();

        if ($request->isMethod('POST')) {

            $RecordsArray = array();
            $RecordsArray['id'] = $request->get('id', 0);
            $RecordsArray['menu_parent_id'] = $request->get('menu_parent_id', 0);
            $RecordsArray['name'] = $request->get('name', '');
            $RecordsArray['route'] = $request->get('route', '');
            $RecordsArray['access_level'] = $request->get('access_level', 0);
            $RecordsArray['sort_id'] = $request->get('sort_id', 0);

            if ($RecordsArray['id'] > 0) {
                $SQLHelper->updateRecord('menu_child', $RecordsArray);
            } else {
                unset($RecordsArray['id']);
                $SQLHelper->insertRecord('menu_child', $RecordsArray);
            }

            return $this->listChildrenAction();
        }

        $params = array('id' => $id);
        $sql = "SELECT * FROM menu_child WHERE id=:id;";
        $menu_child_row = $SQLHelper->fetchRow($sql, $params);

        $params = array();
        $sql = "SELECT * FROM menu_parent ORDER BY sort_id ASC;";
        $menu_parent_rows = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:Menu:view_menu_child.html.php', array('menu_child_row' => $menu_child_row, 'menu_parent_rows' => $menu_parent_rows));
    }

    public function listParentsAction() {

        $SQLHelper = $this->get('cornershort_sql_helper.api');

        $params = array();
        $sql = "SELECT * FROM menu_parent ORDER BY sort_id ASC;";
        $menu_parent_rows = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:Menu:list_menu_parents.html.php', array('menu_parent_rows' => $menu_parent_rows));
    }

    public function viewParentAction($id) {

        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $request = $this->container->get('request_stack')->getCurrentRequest();

        if ($request->isMethod('POST')) {

            $RecordsArray = array();
            $RecordsArray['id'] = $request->get('id', 0);
            $RecordsArray['name'] = $request->get('name', '');
            $RecordsArray['icon'] = $request->get('icon', '');
            $RecordsArray['route'] = $request->get('route', '');
            $RecordsArray['sort_id'] = $request->get('sort_id', 0);

            if ($RecordsArray['id'] > 0) {
                $SQLHelper->updateRecord('menu_parent', $RecordsArray);
            } else {
                unset($RecordsArray['id']);
                $SQLHelper->insertRecord('menu_parent', $RecordsArray);
            }
        }

        $params = array('id' => $id);
        $sql = "SELECT * FROM menu_parent WHERE id=:id;";
        $menu_parent_row = $SQLHelper->fetchRow($sql, $params);


        return $this->render('CornershortMLMappBundle:Menu:view_menu_parent.html.php', array('menu_parent_row' => $menu_parent_row));
    }

}
