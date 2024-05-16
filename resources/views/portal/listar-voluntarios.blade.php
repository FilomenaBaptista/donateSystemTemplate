@extends('layouts.app')

<main>

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
          <div class="container">

              <div class="d-flex justify-content-between align-items-center">
                  <h2>Encontrar Voluntários</h2>
                  <ol>
                      <li><a href="index.html">Home</a></li>
                      <li>Solicitar Doação</li>
                  </ol>
              </div>

          </div>
      </div><!-- End Breadcrumbs -->

  <section id="shop-detail" class="shop-detail">

    <!-- Cart Page Start -->
 <div class="container-fluid py-5">
     <div class="container py-5">
         <div class="table-responsive">
             <table class="table">
                 <thead>
                   <tr>
                     <th scope="col">Id</th>
                     <th scope="col">Nome</th>
                     <th scope="col">Email</th>
                     <th scope="col">Telefone</th>
                     <th scope="col">Profissão</th>
                     <th scope="col">Trabalha actualmente</th>
                     <th scope="col">Descrição</th>
                     <th scope="col">Acções</th>
                   </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <th scope="row">
                             <div class="d-flex align-items-center">
                                 <img src="img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                             </div>
                         </th>
                         <td>
                             <p class="mb-0 mt-4">Big Banana</p>
                         </td>
                         <td>
                             <p class="mb-0 mt-4">2.99 $</p>
                         </td>
                         <td>
                             <div class="input-group quantity mt-4" style="width: 100px;">
                                 <div class="input-group-btn">
                                     <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                     <i class="bi bi-dash-lg"></i>
                                     </button>
                                 </div>
                                 <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                 <div class="input-group-btn">
                                     <button class="btn btn-sm btn-
                                      rounded-circle bg-light border">
                                         <i class="bi bi-plus-lg"></i>
                                     </button>
                                 </div>
                             </div>
                         </td>
                         <td>
                             <p class="mb-0 mt-4">2.99 $</p>
                         </td>
                         <td>
                             <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                 <i class="bi bi-x text-danger"></i>
                             </button>
                         </td>
                     
                     </tr>
                     <tr>
                         <th scope="row">
                             <div class="d-flex align-items-center">
                                 <img src="img/vegetable-item-5.jpg" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                             </div>
                         </th>
                         <td>
                             <p class="mb-0 mt-4">Potatoes</p>
                         </td>
                         <td>
                             <p class="mb-0 mt-4">2.99 $</p>
                         </td>
                         <td>
                             <div class="input-group quantity mt-4" style="width: 100px;">
                                 <div class="input-group-btn">
                                     <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                     <i class="bi bi-dash-lg"></i>
                                     </button>
                                 </div>
                                 <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                 <div class="input-group-btn">
                                     <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                         <i class="bi bi-plus-lg"></i>
                                     </button>
                                 </div>
                             </div>
                         </td>
                         <td>
                             <p class="mb-0 mt-4">2.99 $</p>
                         </td>
                         <td>
                             <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                 <i class="bi bi-x text-danger"></i>
                             </button>
                         </td>
                     </tr>
                     <tr>
                         <th scope="row">
                             <div class="d-flex align-items-center">
                                 <img src="img/vegetable-item-2.jpg" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                             </div>
                         </th>
                         <td>
                             <p class="mb-0 mt-4">Awesome Brocoli</p>
                         </td>
                         <td>
                             <p class="mb-0 mt-4">2.99 $</p>
                         </td>
                         <td>
                             <div class="input-group quantity mt-4" style="width: 100px;">
                                 <div class="input-group-btn">
                                     <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                     <i class="bi bi-dash-lg"></i>
                                     </button>
                                 </div>
                                 <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                 <div class="input-group-btn">
                                     <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                         <i class="bi bi-plus-lg"></i>
                                     </button>
                                 </div>
                             </div>
                         </td>
                         <td>
                             <p class="mb-0 mt-4">2.99 $</p>
                         </td>
                         <td>
                             <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                 <i class="bi bi-x text-danger"></i>
                             </button>
                         </td>
                     </tr>
                 </tbody>
             </table>
         </div>
         <div class="mt-5">
             <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
             <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
         </div>
     </div>
 </div>
 <!-- Cart Page End -->
 </section>
 <!-- Fruits Shop End-->
</main>