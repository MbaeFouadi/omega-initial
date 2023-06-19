<aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar position-relative">
                <div class="d-flex align-items-center logo-box justify-content-start
							d-md-block d-none">
                    <!-- Logo -->
                    <a href="{{('accueil')}}" class="logo">
                        <!-- logo-->
                        <!-- &&	 -->
                        <div class="logo-lg">
                            <span class="light-logo fs-36 fw-700"> <strong> Omeg<span class="text-success">a </strong></span></span>
                        </div>
                    </a>
                </div>
                <div class="user-profile my-15 px-20 py-10 b-1 rounded10 mx-15">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="image d-flex align-items-center">
                            <img src="images/avatar/avatar-13.png" class="rounded-0 me-10" alt="User Image">
                            <div>
                                <h4 class="mb-0 fw-600">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</h4>
                                <p class="mb-0">Etudiant</p>
                            </div>
                        </div>
                        <div class="info">
                            <a class="dropdown-toggle p-15 d-grid" data-bs-toggle="dropdown" href="#"></a>
                            <div class="dropdown-menu dropdown-menu-end">


                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="ti-lock"></i>
                                    Déconnexion</a>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 97%;">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">
                            <a href="{{('home')}}">
                                <li class="header">Menu principal</li>
                            </a>
                                    <li class="treeview">
                                        <a href="#"  >
                                        <span style="width: -5px; height: -5px;"><i class="ti-search"></i></span><span class="path1"></span><span class="path2"></span></i> Recherche
                                            <span class="pull-left-container">
                                            <span style="width: 60px; height: 60px;"><i class="ti-plus"></i></span>
                                              
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="{{('recherche_auto')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Autorisation de paiment</a></li>
                                            <li><a href="{{('recherche_fiche')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Fiche de renseignement</a></li>
                                            <li><a href="{{('recherche_matricule')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Matricule</a></li>
                                           
                                        </ul>
                                    </li>




                                
                           
                        </ul>


                    </div>
                </div>
            </section>
        </aside>