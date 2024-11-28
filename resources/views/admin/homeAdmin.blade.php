@extends('layout.admin')
@section('admin')

         <style>
            .bienvenue{
  top: -30px;
    position: relative;
    left: calc(95% - 55%);
    margin-top: 50px;
    font-size: 25px;
    margin-bottom: 50px;
    margin-left: 20px;
    transition: all 0.3s ease;
}
.bienvenue:hover{
  color: rgb(88, 82, 246);
}
/* ======================= Cards ====================== */
.cardBox {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: auto auto auto;
  grid-gap: 30px;
}

.cardBox .card {
  position: relative;
  background: var(--white);
  padding: 30px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  margin-left: 50px;
  width: 300px;
  height:200px;
  transition: all 0.3s ease;
}
.cardBox .card-dash {
  position: relative;
  background: var(--white);
  padding: 30px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  margin-left: 50px;
  width: 400px;
  height:250px;
  transition: all 0.3s ease;
}
a{
  text-decoration: none;
}
.cardBox .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 30px;
  color: var(--blue);
  top: 40px;
}
.cardBox .card-dash .numbers {
  position: relative;
  font-weight: 500;
  font-size: 30px;
  color: var(--blue);
  top: 40px;
}

.cardBox .card .cardName {
  color: #000;
  font-size: 30px;
  margin-top: 10px;
  position: relative;
  top: 40px;
  margin-left: 5px;
}
.cardBox .card-dash .cardName {
  color: #2e2e2e;
    font-size: 30px;
    margin-top: 30px;
    position: relative;
    top: 22%;
}
.cardBox .card .iconBx {
  font-size: 80px;
    color: #f00;
    position: forrelative;
    top: 30px;
}

.cardBox .card-dash .iconBx {
    font-size: 90px;
    color: #08145a;
    position: relative;
    top: 25%;
    margin-right: 20px;

}
.cardBox .card:hover,.cardBox .card-dash:hover {
  background: rgb(88, 82, 246);

}
.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx,
.cardBox .card-dash:hover .numbers,
.cardBox .card-dash:hover .cardName,
.cardBox .card-dash:hover .iconBx {
  color: var(--white);
}
         </style>


<div class="bienvenue">
    <h3>Espace Admin</h3>
</div>
 <div class="cardBox">
<a href="{{route('demande')}}">
<div class="card-dash">
    <div>
        <div class="cardName">Demmande</div>
    </div>

    <div class="iconBx">
        <ion-icon name="receipt-outline"></ion-icon>
  </div>
</div>
</a>
<a href="{{route('arrchive')}}">
<div class="card-dash">
    <div>
        <div class="cardName">Arrchive</div>
    </div>

    <div class="iconBx">
        <ion-icon name="archive-outline"></ion-icon>
         </div>

</div>
</a>
</div>



@endsection
