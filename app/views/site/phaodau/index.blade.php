@extends('site.layouts.master')

@section('title')
    Phao dầu
@stop

@section('styles')
    {{ HTML::style('assets/css/fuel.css') }}
    {{ HTML::style('assets/css/toastr.min.css') }}
    <style type="text/css">
        #phaodau {
            left:-1000px;
            top:-500px;
            position: relative;
        }
        @media (max-width: 991px){
            #phaodau {
                left:-3000px;
                top:-500px;
                position: relative;
             }
        }

     </style>
@stop

@section('scripts')
    {{ HTML::script('assets/js/fuel.js') }}
    {{ HTML::script('assets/js/toastr.min.js') }}
    {{ HTML::script('assets/jquery-number/jquery.number.js') }}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#phaodau').animate({
                left:'300px',
                top:'300px',
                duration: 500
            }).animate({
            left: '0px',
            top: '0px',
            duration: 1000
            });
//            $('label').addClass('text-right');
        });

    </script>

@stop

@section('content')

<div class="row">
    <div id="phaodau">
        <table id="mytable" style="box-shadow: rgba(200,200,200,1) 4px 4px 8px;">
            <caption style="height: 70px; font-family: sans-serif;font-size: 30px;vertical-align: middle;padding-top: 30px;box-shadow: rgba(200,200,200,1) 4px 4px 8px;" >
                    QUY ĐỔI PHAO DẦU
            </caption>
            <tr>
                <td>{{ Form::label('cboLoaiThietBi', 'Loại thiết bị:', array('style'=>'width: 100px')) }}</td>
                <td colspan="3">
                    {{ Form::select('select', array('3'=>'VNT918S','1'=>'VNT918','2'=>'VNT102'),'3',array('id'=>'cboLoaiThietBi', 'class' => 'input-sm', 'style' => 'height: 30px; width:302px;')) }}
                </td>
                <td style="width: 100%">{{ Form::label('txtHopDaiTruDai','Dài (cm):', array('style'=>'width: 120px')) }}</td>
                <td>
                    {{ Form::text('txtHopDaiTruDai', '', array('class'=>'tru hop decimal')) }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ Form::label('cboLoaiBinhDau', 'Loại bình dầu:') }}
                </td>
                <td colspan="3">
                    {{ Form::select('cboLoaiBinhDau', array('tru'=>'Bình trụ','hop'=>'Bình hộp'),'tru',array('id'=>'cboLoaiBinhDau', 'class' => 'input-sm')) }}
                </td>
                <td>
                    {{ Form::label('txtHopCaoTruCao','Cao (cm):')}}
                </td>
                <td>
                    {{ Form::text('txtHopCaoTruCao','',array('class'=>'tru hop decimal','style'=>'width:auto')) }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ Form::label('cboLoaiPhaoDau', 'Loại phao dầu:') }}
                </td>
                <td colspan="3">
                    {{ Form::select('cboLoaiPhaoDau', array('FS8'=>'FS8','FS7'=>'FS7'), 'FS8', array('id'=>'cboLoaiPhaoDau', 'class' => 'input-sm')) }}
                </td>
                <td>
                    {{ Form::label('txtHopRongTruL','L:',array('id'=>'lblHopRongTruL')) }}
                </td>
                <td>
                    {{ Form::text('txtHopRongTruL','',array('class'=>'hop decimal','name'=>'txtHopRongTruL','style'=>'width:auto','disabled')) }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ Form::label('txtVolMin','Điện áp min (V)') }}
                    </td>
                <td>
                    {{ Form::text('txtVolMin','1',array('class'=>'decimal','style'=>'width: 60px')) }}
                </td>
                <td>
                    {{ Form::label('txtAdcMin','ADC min:',array('style'=>'width: 60px')) }}
                </td>
                <td>
                    {{ Form::text('txtAdcMin','1',array('style'=>'width: 100px','disabled')) }}
                </td>

                <td>
                    {{ Form::label('txtHopaTruR','R:',array('id'=>'lblHopaTruR')) }}
                </td>
                <td>
                    {{ Form::text('txtHopaTruR','',array('name'=>'txtHopaTruR','style'=>'width: auto','disabled')) }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ Form::label('txtVolMax','Điện áp max (V):') }}
                </td>
                <td>
                    {{ Form::text('txtVolMax','5',array('class'=>'decimal','style'=>'width: 60px')) }}
                </td>
                <td>
                    {{ Form::label('txtAdcMax','ADC max:') }}
                </td>
                <td>
                    {{ Form::text('txtAdcMax','5',array('disabled')) }}
                </td>
                <td>
                    {{ Form::label('txtHopbTrua','a:',array('id'=>'lblHopbTrua')) }}
                </td>
                <td>
                    {{ Form::text('txtHopbTrua','',array('name'=>'txtHopbTrua','style'=>'width:auto','disabled'))}}
                </td>
            </tr>
            <tr>
                <td>
                    {{ Form::label('cboDoPhanGiai','Độ phân giải:') }}
                </td>
                <td colspan="3">
                    {{ Form::select('cboDoPhanGiai', array('13.8'=>'13.8','10.0'=>'10.0','6.0'=>'6.0'),'13.8',array('id'=>'cboDoPhanGiai','disabled', 'class' => 'input-sm')) }}
                </td>
                <td>
                    {{ Form::label('txtHopcTrub','b:',array('id'=>'lblHopcTrub')) }}
                </td>
                <td>
                    {{ Form::text('txtHopcTrub','',array('style'=>'width: auto','disabled')) }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ Form::label('txtCachDayBinh','Cách đáy bình:') }}
                </td>
                <td colspan="3">
                    {{ Form::text('txtCachDayBinh','', array('class'=>'decimal','style'=>'width: 100%','disabled')) }}
                </td>
                <td>
                    {{ Form::label('txtTheTich','Thể tích bình (lít)') }}
                </td>
                <td>
                    {{ Form::text('txtTheTich','',array('style'=>'width: auto','disabled')) }}
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    {{ Form::button('CHUYỂN ĐỔI', array('id'=>'btnChuyenDoi','class'=>'btn btn-primary btn-block')) }}

                </td>
            </tr>
        </table>

    </div>
</div>

@stop