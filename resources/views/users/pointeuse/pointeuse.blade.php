


{{--<input type="hidden" name="pointeuseAction" id="pointeuseAction" value="{{Auth::user()->lastPointeuse()->action}}"/>--}}
{{--<button id="pointeuse" onclick="pointer()" type="button" class="btn btn-success">Debut Shift</button>--}}


{{--<script type="text/javascript">--}}
{{--    function shiftOut(){--}}
{{--        document.getElementById('pointeuseAction').value='0';--}}
{{--        document.getElementById("pointeuse").innerHTML = "Fin Shift";--}}
{{--        document.getElementById("pointeuse").classList.remove("btn-success")--}}
{{--        document.getElementById("pointeuse").classList.add("btn-danger")--}}

{{--    }--}}
{{--    function shiftIn(){--}}
{{--        document.getElementById('pointeuseAction').value="1";--}}
{{--        document.getElementById("pointeuse").innerHTML = "Debut Shift";--}}
{{--        document.getElementById("pointeuse").classList.remove("btn-danger")--}}
{{--        document.getElementById("pointeuse").classList.add("btn-success")--}}


{{--    }--}}

{{--    {{Auth::user()->lastPointeuse()->action}} ==1 ? shiftOut():shiftIn()--}}

{{--    function pointer() {--}}
{{--        // console.log(action_id + '** '+etat_id + "////////////");--}}
{{--        var action = document.getElementById('pointeuseAction');--}}
{{--        $.ajax({--}}
{{--            url: "/pointeuse",--}}
{{--            type: "post",--}}
{{--            data: {--}}
{{--                "_token": "{{ csrf_token() }}",--}}
{{--                "action": action.value,--}}
{{--            },--}}
{{--            success: function (response) {--}}

{{--                console.log('++++' + response);--}}
{{--                if(action.value==1){--}}
{{--                    shiftOut();--}}



{{--                }else if(action.value==0){--}}
{{--                    shiftIn()--}}
{{--                     }--}}


{{--            },--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
