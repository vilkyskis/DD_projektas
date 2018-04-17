<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/car')) {
            // car
            if ('/car' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\CarController::index',  '_route' => 'car',);
            }

            // car_register
            if ('/carRegister' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\CarController::carRegister',  '_route' => 'car_register',);
            }

            if (0 === strpos($pathinfo, '/cars/brand')) {
                // cars_brand_index
                if ('/cars/brand' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'App\\Controller\\CarsBrandController::index',  '_route' => 'cars_brand_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_cars_brand_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'cars_brand_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_cars_brand_index;
                    }

                    return $ret;
                }
                not_cars_brand_index:

                // cars_brand_new
                if ('/cars/brand/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'App\\Controller\\CarsBrandController::new',  '_route' => 'cars_brand_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_cars_brand_new;
                    }

                    return $ret;
                }
                not_cars_brand_new:

                // cars_brand_show
                if (preg_match('#^/cars/brand/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'cars_brand_show')), array (  '_controller' => 'App\\Controller\\CarsBrandController::show',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_cars_brand_show;
                    }

                    return $ret;
                }
                not_cars_brand_show:

                // cars_brand_edit
                if (preg_match('#^/cars/brand/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'cars_brand_edit')), array (  '_controller' => 'App\\Controller\\CarsBrandController::edit',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_cars_brand_edit;
                    }

                    return $ret;
                }
                not_cars_brand_edit:

                // cars_brand_delete
                if (preg_match('#^/cars/brand/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'cars_brand_delete')), array (  '_controller' => 'App\\Controller\\CarsBrandController::delete',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_cars_brand_delete;
                    }

                    return $ret;
                }
                not_cars_brand_delete:

            }

            elseif (0 === strpos($pathinfo, '/cars/model')) {
                // cars_model_index
                if ('/cars/model' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'App\\Controller\\CarsModelController::index',  '_route' => 'cars_model_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_cars_model_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'cars_model_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_cars_model_index;
                    }

                    return $ret;
                }
                not_cars_model_index:

                // cars_model_new
                if ('/cars/model/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'App\\Controller\\CarsModelController::new',  '_route' => 'cars_model_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_cars_model_new;
                    }

                    return $ret;
                }
                not_cars_model_new:

                // cars_model_show
                if (preg_match('#^/cars/model/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'cars_model_show')), array (  '_controller' => 'App\\Controller\\CarsModelController::show',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_cars_model_show;
                    }

                    return $ret;
                }
                not_cars_model_show:

                // cars_model_edit
                if (preg_match('#^/cars/model/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'cars_model_edit')), array (  '_controller' => 'App\\Controller\\CarsModelController::edit',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_cars_model_edit;
                    }

                    return $ret;
                }
                not_cars_model_edit:

                // cars_model_delete
                if (preg_match('#^/cars/model/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'cars_model_delete')), array (  '_controller' => 'App\\Controller\\CarsModelController::delete',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_cars_model_delete;
                    }

                    return $ret;
                }
                not_cars_model_delete:

            }

        }

        // app_default_admin
        if ('/admin' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\DefaultController::admin',  '_route' => 'app_default_admin',);
        }

        // app_default_profile
        if ('/profile' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\DefaultController::profile',  '_route' => 'app_default_profile',);
        }

        // login
        if ('/login' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\SecurityController::index',  '_route' => 'login',);
        }

        // logout
        if ('/logout' === $pathinfo) {
            return array('_route' => 'logout');
        }

        if (0 === strpos($pathinfo, '/user')) {
            // user_index
            if ('/user' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\UserController::index',  '_route' => 'user_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_user_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'user_index'));
                }

                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_user_index;
                }

                return $ret;
            }
            not_user_index:

            // user_new
            if ('/user/new' === $pathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\UserController::new',  '_route' => 'user_new',);
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_user_new;
                }

                return $ret;
            }
            not_user_new:

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'App\\Controller\\UserController::show',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_user_show;
                }

                return $ret;
            }
            not_user_show:

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'App\\Controller\\UserController::edit',));
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_user_edit;
                }

                return $ret;
            }
            not_user_edit:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'App\\Controller\\UserController::delete',));
                if (!in_array($requestMethod, array('DELETE'))) {
                    $allow = array_merge($allow, array('DELETE'));
                    goto not_user_delete;
                }

                return $ret;
            }
            not_user_delete:

        }

        if ('/' === $pathinfo) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
