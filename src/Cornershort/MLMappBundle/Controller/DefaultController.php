<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:Default:index.html.php');
    }

    public function sidebarMenuAction($route){

        $session = $this->getRequest()->getSession();

        $em = $this->getDoctrine()->getManager();

        $user_accesslevel = $this->getUser()->getAccessLevel();
        //$user_accesslevel = 100;

        $sql = "SELECT * FROM menu_parent ORDER BY sort_id ASC,name ASC;";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        $menu_parent = array();
        foreach ($results as $nDx => $parent) {
            $menu_parent[] = $parent;

            if ($parent['route'] == $route) {
                $session->set('menu_parent_name', '');
                $session->set('menu_parent_icon', '');
                $session->set('menu_name', $parent['name']);
                $session->set('menu_route', $parent['route']);
            }
        }

        $sql = "SELECT menu_child.*,menu_parent.name as menu_parent_name,menu_parent.icon as menu_parent_icon FROM menu_child,menu_parent WHERE menu_child.route<>:route AND menu_parent.id=menu_child.menu_parent_id ORDER BY menu_child.menu_parent_id ASC,menu_child.sort_id ASC,menu_child.id ASC;";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->bindValue('route', '');
        $stmt->execute();
        $results = $stmt->fetchAll();

        $menu_child = array();
        foreach ($results as $nDx => $child) {
            $menu_child[$child['menu_parent_id']][] = $child;

            if ($child['route'] == $route) {
                $session->set('menu_parent_name', $child['menu_parent_name']);
                $session->set('menu_parent_icon', $child['menu_parent_icon']);
                $session->set('menu_name', $child['name']);
                $session->set('menu_route', $child['route']);
            }
        }
        return $this->render('CornershortMLMappBundle:Layout:sidebar.html.php', array(
            'menu_parent' => $menu_parent,
            'menu_child' => $menu_child,
            'route' => $route,
            'user_accesslevel' => $user_accesslevel
        ));
    }

    public function pageHeaderAction(){
        return $this->render('CornershortMLMappBundle:Layout:header.html.php');
    }
}
