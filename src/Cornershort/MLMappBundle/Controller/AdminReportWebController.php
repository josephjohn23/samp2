<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminReportWebController extends Controller
{
    public function salesTab1Action(){
        return $this->render('CornershortMLMappBundle:AdminReport:salesTab1.html.php');
    }

    public function salesTab2Action(){
        return $this->render('CornershortMLMappBundle:AdminReport:salesTab2.html.php');
    }

    public function salesTab3Action(){
        return $this->render('CornershortMLMappBundle:AdminReport:salesTab3.html.php');
    }

    public function bankWithdrawShowAction(){
        return $this->render('CornershortMLMappBundle:AdminReport:bankWithdrawShow.html.php');
    }

    public function bankWithdrawAddAction(){
        return $this->render('CornershortMLMappBundle:AdminReport:bankWithdrawAdd.html.php');
    }

    public function bankWithdrawEditAction($id){
        return $this->render('CornershortMLMappBundle:AdminReport:bankWithdrawEdit.html.php');
    }
}
