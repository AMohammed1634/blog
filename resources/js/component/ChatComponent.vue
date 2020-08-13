<template>

    <div class="row">
        <div class="col-lg-9 box-body" style="height: 550px">
            <div class="direct-chat-messages" style="height: 540px">
                <div class="card direct-chat direct-chat-primary" v-if="chatWith" style="height: 95%">
                    <div class="card-header ui-sortable-handle">
                        <h3 class="card-title">Chat With
                            <span class="badge badge-info">{{ chatWith.name }}</span>
                        </h3>
                        <div class="card-tools">
                            <div v-if="this.typingNow" style="color:green">typing ...</div>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;height: 80%">
                        <ul class="direct-chat-messages" id="your_div" v-chat-scroll style="height: 100%">
                            <li v-for="message in messageList">
                            <component :key="Math.random().toString()"
                                       :is="message.componentName"
                                       :data="message"

                            >

                            </component>
                            </li>
                        </ul>


                    </div>

                    <div class="card-footer" style="display: block;">
                        <!--@submit.prevent="sendMessage"-->
                        <form action="#" @submit.prevent="">


                            <div class="form-group row" style="margin-left:0px;margin-right:0px">

                                <div class="col-lg-10">
                                    <input
                                        type="text" v-model="messageContent"
                                        @keydown="sendTypingEvent"
                                        @keyup.enter="sendMessage"
                                        placeholder="Type Message ..."
                                        class="form-control "
                                    />
                                </div>
<!--                                <span class="input-group-append col-lg-2">-->
<!--                                    <button type="submit" class="btn btn-primary">-->
<!--                                        Send <i class="fas fa-paper-plane"></i>-->
<!--                                    </button>-->
<!--                                </span>-->
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 box-body" style="background-color: #222d32;height: 550px;overflow: auto">

            <ul class="contacts-list" >
                <li v-for="user in users" v-if="auth_id.id != user.id" @click="selectUser(user)">

                    <a href="#">
                        <img :src="imgPath+user.img" class="contacts-list-img" style="width: 40px; height: 40px;">
                        <div class="contacts-list-info">
                            <span class="contacts-list-name">{{ user.name }}
                                <small class='contacts-list-date pull-right'>
                                    <i v-if='user.is_active == 1' class='fa fa-circle text-success'></i>
                                    <span v-else>{{ user.last_activation_date }} </span>
                                </small>
                            </span>

                            <span class="contacts-list-msg">
<!--                                <div v-if="this.typingNow" style="color:green">typing ...</div>-->
                                 <div
                                     v-if="chatWith != null && typingNow == true && user.id == write_from
                                            && write_to == auth_id.id"
                                     style="color:green">typing ...</div>
                            </span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
    import myMessage from "./myMessage";
    import guestMessage from "./guestMessage";
    // import $ from 'jquery'
    import axios from 'axios'



    export default {
        components: {
            myMessage, guestMessage
        },
        data(){
            return {
                messages:'',
                messageSend:"",
                imgPath:"/storage/profile_images/",
                chatWith: null, // user
                activeUsers: [],
                typingUser: null,
                isTyping: false,
                messageList:[],
                messageContent:"",
                typingNow:false,
                write_from:null,
                write_to:null,
            }
        },
        props:[ "users" ,"auth_id",'auth_name','img',"user"],
        created() {

            this.scrollToBottom();
            window.Echo.channel(`Typing`).listen("TypingMessage",(e)=>{
                console.log(e);

                if(this.chatWith !=null && this.chatWith.id == e.typing.write_from
                    && this.auth_id.id == e.typing.write_to
                    && e.typing.is_writing_now == true
                ){ //is_writing_now
                    this.typingNow = true;
                    this.write_from = e.typing.write_from;
                    this.write_to = e.typing.write_to;

                }else{
                    this.typingNow = false;
                }
            });

               window.Echo.channel(`App.User.${this.auth_id.id}`)
               .listen('MessageSend', (e) => {
                   console.log(e);
                      // if(this.chatWith.id == e.message.message_from && this.auth_id.id == e.message.message_to)
                   if(this.chatWith && e.message.message_from == this.chatWith.id)
                   {
                          console.log(e);
                          this.messageList.push({
                              body:{
                                  content:e.message.message,
                                  created_at:e.message.created_at,
                                  userName:this.chatWith.name,
                                  img:this.imgPath + this.chatWith.img,
                              },
                              componentName: "guestMessage",
                          });
                          (new Audio("/sounds/slack.mp3")).play();

                      }


               });


            setInterval(()=>{
                console.log("basket");
                if(this.chatWith != null) {
                    axios.get(`/user/typingFalse/${this.chatWith.id}/${this.auth_id.id}`).then(
                        response => {
                            console.log(response)
                        }
                    )
                }
            },3000)

            if(this.user == -1){
                console.log("-1");
            }else{
                console.log("object")
                this.selectUser(this.user);


            }

        },
        computed:{

        },

        methods:{
            updateNotTyping:function() {
                console.log("basket");
                axios.get(`/user/typingFalse/${this.chatWith.id}/${this.auth_id.id}`).then(
                    response =>{
                        console.log(response)
                    }
                )
            },
            updated() {
              this.scrollToBottom()
            },
            scrollToBottom() {
                // if ($(".direct-chat-messages")[0])
                //     $('.direct-chat-messages').scrollTop($(".direct-chat-messages")[0].scrollHeight);


            },

            fetchMessages:function(){

            },
            sendMessage:function (){
                // alert("Submin")
                this.messageList.push({
                    body:{
                        content:this.messageContent,
                        created_at:"335599",
                        userName:this.auth_id.name,
                        img:this.imgPath + this.auth_id.img,
                    },
                    componentName: "myMessage"
                })
                // axios.post("")

                axios.post(`/messageSend/${this.chatWith.id}`, {message: this.messageContent});

                this.messageContent = "";

            },
            sendTypingEvent:function(){
                // alert("typing ...")
                // Echo.join("chat").whisper("typing",this.auth_id);

                axios.get(`/user/typing/${this.chatWith.id}/${this.auth_id.id}`).then(
                    response =>{
                        console.log(response)
                    }
                )
                // let channel = Echo.private('chat')
                //
                // setTimeout( () => {
                //     channel.whisper('typing', {
                //         user: this.auth_id,
                //         typing: true
                //     })
                // }, 300)
            },
            selectUser:function (user){
                this.chatWith = user;
                // get messages between auth and user
                console.log(`/userMessages/${this.auth_id.id}/${user.id}`);
                axios.get(`/userMessages/${this.auth_id.id}/${user.id}`).then(response => {
                    this.messageList = []
                    response.data.forEach(message_i => {
                        this.messageList.push({
                            body: {

                                content: message_i.message,
                                created_at: message_i.created_at,
                                userName: message_i.message_from == this.auth_id.id ? this.auth_id.name : this.chatWith.name,
                                img : message_i.message_from == this.auth_id.id ? this.imgPath+this.auth_id.img : this.imgPath+this.chatWith.img,

                            },
                            componentName: message_i.message_from == this.auth_id.id ? 'myMessage' : 'guestMessage',
                        })
                    })
                })
                console.log("444")
                this.scrollToBottom();
            },
        },

    }
</script>

<style scoped>

</style>
