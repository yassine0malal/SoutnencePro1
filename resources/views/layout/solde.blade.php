@extends('layout.admin')
@section('admin')


  <style>


@media print {
 .table, .table__body {
  overflow: visible;
  height: auto !important;
  width: auto !important;
 }
}





main.table {

    height: 90vh;
    margin-left: 10px;
    margin-top: 40px;

    backdrop-filter: blur(7px);

    border-radius: .8rem;

    overflow: hidden;
}

.table__header {
    width: 100%;
    height: 10%;
    background-color: rgba(255, 255, 255, 0.267);
    padding: .8rem 1rem;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(89% - 1.6rem);
    background-color: #fffb;

    margin: .8rem auto;
    border-radius: .6rem;

    overflow: auto;
    overflow: overlay;
}


.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{
    visibility: visible;
}


table {
    width: 100%;
}

td img {
    width: 36px;
    height: 36px;

    border-radius: 50%;
    margin-right: .5rem;
    vertical-align: middle;
}

table, th, td {
    border-collapse: collapse;
    padding: 1rem;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color: rgba(0, 17, 175, 0.267);
    cursor: pointer;
    text-transform: capitalize;
}

tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
    background-color: #ebc474;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;

    text-align: center;
    font-size: 1rem;

    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #000000;
}

thead th:hover {
    color: #ffffff;
}

/* ////////////////////////////////// */
.btn {
    color: rgb(17, 3, 108);
    text-transform: uppercase;
    text-decoration: none;
    border: 2px solid rgb(17, 3, 108);
    padding: 10px 20px;
    font-size: 10px;
    font-weight: bold;
    background: transparent;
    position: relative;
    transition: all 1s;
    overflow: hidden;
    border-radius: 8px;
  }

  .btn:hover {
    z-index: 100;
    color: rgb(255, 255, 255);
  }

  .btn::before {
    content: '';
    position: absolute;
    height: 100%;
    width: 0%;
    top: 0;
    left: -40px;
    transform: skewX(45deg);
    background-color: rgb(34, 19, 131);
    transition: all 1s;
    z-index: -1;
  }

  .btn:hover::before {
    width: 160%;
  }




    </style>





    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Entreprise</h1>


        </section>
        <section class="table__body">
            <table id="companies_table">
                <thead>
                    <tr>
                        <th>Nom D'entreprise</th>
                        <th>Solde</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($soldes as $solde)
                    <tr>
                        <td>{{$solde->company}}</td>
                        <td>{{$solde->solde}}</td>
                        <td>
                            <a href="{{route('soldes.post',$solde->id)}}" class="btn"> Modifier Solde</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>

</body>

@endsection
