@extends('admin.masterAdmin')
@section('title')
    T-shirt D.L | Messages
@endsection

<style xmlns="http://www.w3.org/1999/html">
    .right .direct-chat-text {
        background: #f39c12;
        border-color: #f39c12;
        color: #fff;
        border-left-color: #f39c12;
    }
    .right .direct-chat-text:after, .right .direct-chat-text:before{
        right: auto;
        left: 100%;
        border-right-color: transparent;
        border-left-color: #f39c12;
    }
</style>
@section("head-admin")
    <style>
        .content-header{
            display: none;
        }
        .content, .container-fluid{
            padding-top: 0px;
        }
    </style>
Messages
@endsection

@section('styleLinks')

@endsection

@section('messages')
    class="active"
@endsection

@section('body')

    <style>
        .right .direct-chat-text:after, .right .direct-chat-text:before{
            right: auto;
            left: 100%;
            border-right-color: transparent;
            border-left-color: #f39c12;
        }
    </style>
    <div class="row" id="vue">
      <div class="col-lg-9 box-body" style="height: 550px">
          <div class="direct-chat-messages" style="height: 468px">
{{--              <!-- Message. Default to the left  belongs to me-->--}}
{{--              <div class="direct-chat-msg">--}}
{{--                  <div class="direct-chat-info clearfix">--}}
{{--                      <span class="direct-chat-name pull-left">Alexander Pierce</span>--}}
{{--                      <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-info -->--}}
{{--                  <img class="direct-chat-img" src="/dist/img/user1-128x128.jpg" alt="message user image">--}}
{{--                  <!-- /.direct-chat-img -->--}}
{{--                  <div class="direct-chat-text">--}}
{{--                      Is this template really for free? That's unbelievable!--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-text -->--}}
{{--              </div>--}}
{{--              <!-- /.direct-chat-msg -->--}}

{{--              <!-- Message to the right -->--}}
{{--              <div class="direct-chat-msg right">--}}
{{--                  <div class="direct-chat-info clearfix">--}}
{{--                      <span class="direct-chat-name pull-right">Sarah Bullock</span>--}}
{{--                      <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-info -->--}}
{{--                  <img class="direct-chat-img" src="/dist/img/user3-128x128.jpg" alt="message user image">--}}
{{--                  <!-- /.direct-chat-img -->--}}
{{--                  <div class="direct-chat-text">--}}
{{--                      You better believe it!--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-text -->--}}
{{--              </div>--}}
{{--              <!-- /.direct-chat-msg -->--}}

{{--              <!-- Message. Default to the left -->--}}
{{--              <div class="direct-chat-msg">--}}
{{--                  <div class="direct-chat-info clearfix">--}}
{{--                      <span class="direct-chat-name pull-left">Alexander Pierce</span>--}}
{{--                      <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-info -->--}}
{{--                  <img class="direct-chat-img" src="/dist/img/user1-128x128.jpg" alt="message user image">--}}
{{--                  <!-- /.direct-chat-img -->--}}
{{--                  <div class="direct-chat-text">--}}
{{--                      Working with AdminLTE on a great new app! Wanna join?--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-text -->--}}
{{--              </div>--}}
{{--              <!-- /.direct-chat-msg -->--}}

{{--              <!-- Message to the right -->--}}
{{--              <div class="direct-chat-msg right">--}}
{{--                  <div class="direct-chat-info clearfix">--}}
{{--                      <span class="direct-chat-name pull-right">Sarah Bullock</span>--}}
{{--                      <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-info -->--}}
{{--                  <img class="direct-chat-img" src="/dist/img/user3-128x128.jpg" alt="message user image">--}}
{{--                  <!-- /.direct-chat-img -->--}}
{{--                  <div class="direct-chat-text">--}}
{{--                      I would love to.--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-text -->--}}
{{--              </div>--}}
{{--              <!-- /.direct-chat-msg -->--}}

{{--              <!-- Message. Default to the left -->--}}
{{--              <div class="direct-chat-msg">--}}
{{--                  <div class="direct-chat-info clearfix">--}}
{{--                      <span class="direct-chat-name pull-left">Alexander Pierce</span>--}}
{{--                      <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-info -->--}}
{{--                  <img class="direct-chat-img" src="/dist/img/user1-128x128.jpg" alt="message user image">--}}
{{--                  <!-- /.direct-chat-img -->--}}
{{--                  <div class="direct-chat-text">--}}
{{--                      Working with AdminLTE on a great new app! Wanna join?--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-text -->--}}
{{--              </div>--}}
{{--              <!-- /.direct-chat-msg -->--}}

{{--              <!-- Message to the right -->--}}
{{--              <div class="direct-chat-msg right">--}}
{{--                  <div class="direct-chat-info clearfix">--}}
{{--                      <span class="direct-chat-name pull-right">Sarah Bullock</span>--}}
{{--                      <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-info -->--}}
{{--                  <img class="direct-chat-img" src="/dist/img/user3-128x128.jpg" alt="message user image">--}}
{{--                  <!-- /.direct-chat-img -->--}}
{{--                  <div class="direct-chat-text">--}}
{{--                      I would love to.--}}
{{--                  </div>--}}
{{--                  <!-- /.direct-chat-text -->--}}
{{--              </div>--}}
{{--              <!-- /.direct-chat-msg -->--}}

          </div>
          <div class="box-footer">
              <form action="#" method="post">
                  <div class="input-group">
                      <input type="text" name="message" id="inputMessageAhmed"
                             placeholder="Type Message ..." class="form-control"
                      v-on:keyup="inputBoxKeyUp">
                      <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat">Send</button>
                          </span>
                  </div>
              </form>
          </div>
      </div>
      <div class="col-lg-3 box-body" style="background-color: #222d32;height: 550px;overflow: auto">{{--Users Concate--}}

          <ul class="contacts-list" >
              @foreach($users as $user)
                  @if($user->id == auth()->user()->id)

                      @continue
                  @endif
                  <?php
                  $lastMessage = \App\message::where([
                      ['message_from',$user->id],
                      ['message_to',auth()->user()->id]
                  ])->orWhere([
                      ['message_to',$user->id],
                      ['message_from',auth()->user()->id]
                  ])->latest('id')->limit(1)->get()
                  ?>
                  <contact-item user_id="{{$user->id}}" auth_id="{{auth()->user()->id}}"
                                img="{{$user->img}}" name="{{$user->name}}" is_active="{{$user->is_active}}"
                                last_activation_date="{{$user->last_activation_date}}"
                                numMessages="{{count($lastMessage)}}"
                                @if(count($lastMessage) > 0)
                                    readed="{{$lastMessage[0]->readed}}"
                                    message="{{$lastMessage[0]->message}}"
                                @endif
                  >

                  </contact-item>
              @endforeach
          </ul>


{{--          <ul class="contacts-list" >--}}

{{--              @for($i=0;$i<count($users);$i++)--}}
{{--                  @if($users[$i]->id  == auth()->user()->id)--}}
{{--                      @continue--}}
{{--                  @endif--}}
{{--                  <li id="{{$users[$i]->id}}" onclick="contactChatClick({{$users[$i]->id}},{{auth()->user()->id}})"--}}
{{--                  @click="getMessages({{$users[$i]->id}},{{auth()->user()->id}})">--}}
{{--                      <a href="#">--}}
{{--                          <img class="contacts-list-img" src="/storage/profile_images/{{$users[$i]->img}}"--}}
{{--                               alt="User Image" style="width: 40px;height: 40px">--}}

{{--                          <div class="contacts-list-info">--}}
{{--                              <div style="display: none">{{$users[$i]->id}}</div>--}}
{{--                                    <span class="contacts-list-name">--}}
{{--                                      {{$users[$i]->name}}--}}
{{--                                      <small class="contacts-list-date pull-right">--}}

{{--                                        @if($users[$i]->is_active == 1)--}}

{{--                                              <i class="fa fa-circle text-success"></i>--}}
{{--                                        @else--}}
{{--                                            {{$users[$i]->last_activation_date}}--}}
{{--                                        @endif--}}
{{--                                      </small>--}}
{{--                                    </span>--}}
{{--                              <?php ?> --}}
{{--                              $lastMessage = \App\message::where([--}}
{{--                                  ['message_from',$users[$i]->id],--}}
{{--                                  ['message_to',auth()->user()->id]--}}
{{--                              ])->orWhere([--}}
{{--                                  ['message_to',$users[$i]->id],--}}
{{--                                  ['message_from',auth()->user()->id]--}}
{{--                              ])->latest('id')->limit(1)->get()--}}
{{--                              ?>--}}
{{--                              --}}{{--{{$lastMessage}}--}}
{{--                              <span class="contacts-list-msg">--}}
{{--                                  --}}{{--{{$lastMessage->message}}--}}
{{--                                  @if(count($lastMessage) <= 0)--}}

{{--                                      <span style="font-weight: bold;color: #FFF">{{"say waves to ". $users[$i]->name }}</span>--}}
{{--                                  @else--}}
{{--                                      @if($lastMessage[0]->readed == 0)--}}
{{--                                          <div id="message{{$users[$i]->id}}" style="font-weight: bold;color: #FFF">{{$lastMessage[0]->message}}</div>--}}
{{--                                      @else--}}
{{--                                          <div id="message{{$users[$i]->id}}">{{$lastMessage[0]->message}}</div>--}}
{{--                                      @endif--}}
{{--                                  @endif--}}
{{--                              </span>--}}
{{--                          </div>--}}
{{--                          <!-- /.contacts-list-info -->--}}
{{--                      </a>--}}
{{--                  </li>--}}
{{--                  <!-- End Contact Item -->--}}

{{--              @endfor--}}


{{--          </ul>--}}


      </div>

        <message-from-me name="ahmed" date="12-5-999" img="noImage.jpg" message="A&A"></message-from-me>
    </div>


@endsection

@section('JSLinks')
<script>
    var currentUser = null;
    function contactChatClick(userID,authID) {
        // alert(userID+"  "+authID);
        var url = "/admin/getMessages/"+userID+"/"+authID;
        console.log(url);
        $.get(url,function (data) {
            console.log(data);
            if(data.length <= 0 ){
                // $(".direct-chat-messages").attr('id',"usr-"+userID);
                $(".direct-chat-messages").html("" +
                    "Start Conversion With ..");
                console.log("inner IF");
            }else{
                currentUser = data[0].user.id;
                var $string = '<div id="chat'+data[0].user.id+'" class="direct-chat-messages" style="height: 468px">'; //
                for(i=0;i<data.length;i++){
                    $string+="";
                    if(data[i].message_from == "{{auth()->user()->id}}"){
                        $string+=" <div class=\"direct-chat-msg\">\n" +
                            "                  <div class=\"direct-chat-info clearfix\">\n" +
                            "                      <span class=\"direct-chat-name pull-left\">{{auth()->user()->name}}</span>\n" +
                            "                      <span class=\"direct-chat-timestamp pull-right\">"+data[i].created_at+"</span>\n" +
                            "                  </div>\n" +
                            "                  <!-- /.direct-chat-info -->\n" +
                            "                  <img class=\"direct-chat-img\" src=\"/storage/profile_images/{{auth()->user()->img}}\" alt=\"message user image\">\n" +
                            "                  <!-- /.direct-chat-img -->\n" +
                            "                  <div class=\"direct-chat-text\">\n" +
                            "                      "+data[i].message+"\n" +
                            "                  </div>\n" +
                            "                  <!-- /.direct-chat-text -->\n" +
                            "              </div>";
                    }else{
                        $string+="<div class=\" right\">\n" +
                            "                  <div class=\"direct-chat-info clearfix\">\n" +
                            "                      <span class=\"direct-chat-name pull-right\">"+data[i].user.name+"</span>\n" +
                            "                      <span class=\"direct-chat-timestamp pull-left\">"+data[i].created_at+"</span>\n" +
                            "                  </div>\n" +
                            "                  <!-- /.direct-chat-info -->\n" +
                            "                  <img class=\"direct-chat-img\" src='\\storage\\profile_images\\"+data[i].user.img+"' alt=\"message user image\">\n" +
                            "                  <!-- /.direct-chat-img -->\n" +
                            "             <div class=\"direct-chat-text\">\n" +
                            "                      "+data[i].message+"\n" +
                            "                  </div>\n" +
                            "                  <!-- /.direct-chat-text -->\n" +
                            "              </div> ";
                    }
                }
                $string +="</div>";
                $(".direct-chat-messages").html($string);
                // console.log($string);
            }

        });


    }

    /**
     * is Writing function
     *
    document.getElementById("inputMessageAhmed").onkeyup = function(){
        alert("docu;akv");
    }
    $("#inputMessageAhmed").keypress(function () {
        console.log("key press")
        if(currentUser == null){
            return ;
        }
        // console.log("key press..")
        $.ajax({
            "type":"get",
            "url":"/admin/writing/"+currentUser+"/"+"{{auth()->user()->id}}",
            "success":function (response) {
                console.log(response);
            }
        })
    });*/

    setInterval(function () {
        // console.log("isWriting ...");

        // $lastMessage = $("div#message"+response[0].write_from/*+" span.message"+response[0].write_from*/).html();
        // if(currentUser == null){
        //     return ;
        // }
        $.ajax({
            "type":"get",
            "url":"/admin/isWriting/"+"{{auth()->user()->id}}",
            "success":function (response) {
                response = JSON.parse(response)
                console.log(response);
                for(i=0;i<response.length;i++){
                    if(response[i].is_writing_now == 1){
                        // alert("typing");
                        $select = "li#"+response[i].write_from+" "
                        $asd = $("div#message"+response[i].write_from/*+" span.message"+response[0].write_from*/);
                        console.log($asd);
                        $asd.html("<div style='color:green'>typing....</div>");
                        $var =  $(".direct-chat-messages").children("#typing").attr("id");
                        if($var == "typing"){
                            return ;
                        }
                        $("#chat"+response[i].write_from).append("<div id='typing'>Typing..</div>");
                    }else{
                        $(".direct-chat-messages").children("#typing").remove();
                        $asd = $("div#message"+response[i].write_from/*+" span.message"+response[0].write_from*/);
                        $asd.html("******");
                    }
                }
            }
        })
    },2000);
    setInterval(function () {
        if(currentUser == null){
            return ;
        }
        // console.log("ASDSetInterv.......");
        $.ajax({
            "type":"get",
            "url":"/admin/writingFalse/"+currentUser+"/"+"{{auth()->user()->id}}",
            "success":function (response) {
                console.log(response);
            }
        })
    },3000);

    /**
     * get update
     */
</script>

<script src="/vue/node_modules/vue/dist/vue.js"></script>
<script src="/vue/vue-resource.js"></script>

    <script>
        /**
         * component for message
         */
        Vue.component("message-from-me",{
            template:"<div class='direct-chat-msg'>" +
                    "<div class='direct-chat-info clearfix' >" +
                        "<span class='direct-chat-name pull-left'> @{{ name }}</span> "+
                        "<span class='direct-chat-timestamp pull-right'> @{{ date }}</span> "+
                    "</div>"+
                    "<img class='direct-chat-img' v-bind:src='image+img' >"+
                    "<div class='direct-chat-text' >@{{ message }}</div>"
                +"</div>",
            props:[
                "name","date","img","message"
            ],
            data:function () {
                return{
                    image:"/storage/profile_images/"
                }
            }
        })
        Vue.component("contact-item",{
            template:"<li :id='user_id' @click='getMessages(user_id,auth_id)' :onclick='funcName+user_id+qoma+auth_id+closePracet'> <a href='#'>" +
                    "<img :src='path+img' style='width: 40px;height: 40px' class='contacts-list-img'/> " +
                    "<div class='contacts-list-info'>" +
                        "<span class='contacts-list-name'> @{{ name }}" +
                            "<small class='contacts-list-date pull-right'>" +
                                "<i v-if='is_active == 1' class='fa fa-circle text-success'></i>" +
                                "<span v-else>@{{ last_activation_date }} </span>" +
                            "</small> " +
                        "</span>" +
                        "<span class='contacts-list-msg'>" +
                            "<span v-if='numMessages <= 0' style='font-weight: bold;color: #FFF'> Say Wave to ..</span>" +
                            "<span v-else >" +
                                "<div v-if='readed == 0' :id='id+user_id' style='font-weight: bold;color: #FFF' > @{{ message }}</div> "+
                                " <div v-else :id='id+user_id' > @{{ message }}</div>"+
                            "</span>"+
                        "</span> "+
                    "</div> "+
                "</a></li>",
            props:["user_id","auth_id","img","name","is_active","last_activation_date","numMessages","readed","message"],
            data:function () {
                return {
                    path:"/storage/profile_images/",
                    funcName:"contactChatClick(",
                    qoma:",",
                    closePracet:")",
                    id:"message"
                }
            },
            methods:{
                getMessages:function(user_id,auth_id){

                },
            }
        })
        let app = new Vue({
            el:"#vue",
            data:{
                messages : [

                ],
                textDisplay:""
            },
            methods:{

                //set is user is typing now
                inputBoxKeyUp:function(event){
                    if(currentUser == null)
                        return;
                    console.log(event);
                    this.$http.get("/admin/writing/"+currentUser+"/{{auth()->user()->id}}").then(
                        response =>{
                            console.log(response.body)
                        },response=>{

                        }
                    )
                },
                getMessages:function (userID, authID) {
                    // GET /someUrl
                    this.$http.get("/admin/getMessages/"+userID+"/"+authID).then(response => {

                        // get body data
                        this.messages = response.body;
                        if(this.messages.length <= 0){

                        }else{
                            {{--this.textDisplay =--}}
                            {{--    '<div id="chat'+this.messages[0].user.id+'" class="direct-chat-messages" style="height: 468px">';--}}
                            {{--for(i=0;i<this.messages.length;i++){--}}
                            {{--    if(this.messages[i].message_from == "{{auth()->user()->id}}"){--}}
                            {{--        this.textDisplay +=--}}
                            {{--            "<message-from-me name='{{auth()->user()->name}}' :date='this.messages[i].created_at' "+--}}
                            {{--            "  :img='this.messages[i].user.img' :message='this.messages[i].message'></message-from-me>"--}}
                            {{--    }else{--}}
                            {{--        this.textDisplay +="asd"--}}
                            {{--    }--}}
                            {{--}--}}
                            {{--this.textDisplay +="<div>";--}}
                            {{--$(".direct-chat-messages").html(this.textDisplay );--}}
                        }

                    }, response => {
                        // error callback
                    });
                }
            }
        })
    </script>
@endsection
