<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('catproduit') }}'><i class='nav-icon fa fa-shopping-cart'></i> Catégories des Produits</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('produits') }}'><i class="nav-icon fa fa-shopping-cart"></i> Produits</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('client') }}'><i class='nav-icon fa fa-users'></i> Clients</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('formule') }}'><i class='nav-icon fa fa-list'></i> Formules</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('commentaire') }}'><i class='nav-icon fa fa-pencil'></i> Commentaires</a></li>