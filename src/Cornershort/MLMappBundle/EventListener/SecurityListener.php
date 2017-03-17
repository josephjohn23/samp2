<?php

namespace Cornershort\MLMappBundle\EventListener;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityListener {

    private $em = null;
    private $stmt = null;
    private $sc = null;

    public function __construct(EntityManager $EntityManager, SecurityContext $SecurityContext) {
        $this->em = $EntityManager;
        $this->sc = $SecurityContext;
    }

    public function onKernelController(FilterControllerEvent $event) {

        if($this->sc->getToken() != null){
      	    $user = $this->sc->getToken()->getUser();
      	} else {
      	    $user = null;
      	}

        if (!is_object($user) || !$user instanceof UserInterface) {
            $user_id = 0;
            $access_level = 0;
        } else {
            $route = $event->getRequest()->get('_route');
            if ($route) {
                $user_id = $user->getId();
                $access_level = $user->getAccessLevel();

                $params = array();
                $params['route'] = $route;
                $sql = "SELECT * FROM menu_child WHERE route=:route LIMIT 1";

                $this->stmt = $this->em->getConnection()->prepare($sql);
                $this->stmt->execute($params);
                $result = $this->stmt->fetchAll();

                if (isset($result[0]['access_level'])) {
                    if ($result[0]['access_level'] > $access_level) {
                        throw new AccessDeniedException('You are not authorized to access this location.');
                    }
                }
            }
        }
      }
}

?>
