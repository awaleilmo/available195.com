@php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Report Transaksi $ket Cluster $cluster Tanggal $tgl1 - $tgl2.xls");
@endphp
<table border='1' class="table table-striped table-bordered" id="datatable-responsive1" >
                                    <thead>
                                     <tr class="row">
                                        <td>
                                            Tanggal
                                        </td>
                                        <td>
                                            Produk
                                        </td>
                                        <td>
                                            Quantity
                                        </td>
                                        <td>
                                            Harga Asli
                                        </td>
                                    </tr>
                                   </thead>
                                  <tbody>
                                    @foreach($alltemp as $tes)
                                    <tr class="row">
                                        <td>
                                            {{ $tes->tgl }}
                                        </td>
                                        <td>
                                            {{ $tes->prod_desk }}
                                        </td>
                                          <td>
                                            {{ $tes->kuantiti }}
                                        </td>
                                        <td>
                                            {{$tes->harga_asli}}
                                        </td>                               
                                    </tr>
                                    @endforeach
                                     </tbody>
                                </table>