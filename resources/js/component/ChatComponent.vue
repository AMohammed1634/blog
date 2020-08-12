<template>

    <div class="row">
        <div class="col-lg-9 box-body" style="height: 550px">
            <div class="direct-chat-messages" style="height: 468px">
                <div class="card direct-chat direct-chat-primary" v-if="chatWith">
                    <div class="card-header ui-sortable-handle">
                        <h3 class="card-title">Chat With <span class="badge badge-info">{{ chatWith.name }}</span></h3>
                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="direct-chat-messages" id="your_div">
                            <component :key="Math.random().toString()" v-for="message in messageList"
                                       :is="message.componentName"
                                       :data="message"

                            >

                            </component>
                        </div>


                    </div>

                    <div class="card-footer" style="display: block;">
                        <!--@submit.prevent="sendMessage"-->
                        <form action="#" @submit.prevent="">


                            <div class="form-group row">

                                <div class="col-lg-8">
                                    <input
                                        type="text" v-model="messageContent"
                                        @keydown="sendTypingEvent"
                                        @keyup.enter="sendMessage"
                                        placeholder="Type Message ..."
                                        class="form-control col-lg-12"
                                    />
                                </div>
                                <span class="input-group-append col-lg-2">
                                    <button type="submit" class="btn btn-primary">
                                        Send <i class="fas fa-paper-plane"></i>
                                    </button>
                                </span>
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
            }
        },
        props:[ "users" ,"auth_id",'auth_name','img'],
        created() {
            this.scrollToBottom();
            // window.Echo.channel(`App.User.${ this.auth_id.id }`).listen("MessageSend",(event)=>{
            //     console.log("ASDDD");
            //
            //     if(this.chatWith && this.chatWith.id == event.message.message_from){
            //         this.messageList.push({
            //             body:{
            //                 content:event.message.message,
            //                 created_at:event.message.created_at,
            //                 userName:"mmkk",
            //                 img:this.imgPath + this.chatWith.img,
            //             },
            //             componentName: "guestMessage"
            //         })
            //     }
            // })



              window.Echo.channel(`chat`)
              .listen('MessageSend', (e) => {


                  if(this.chatWith != null){
                    console.log(e);

                    if(this.chatWith.id == e.message.message_from && this.auth_id.id == e.message.message_to)
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
                      })
                    }
                  }

              });


        },
        computed:{

        },
        methods:{
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
            },
            selectUser:function (user){
                this.chatWith = user;
                // get messages between auth and user
                console.log(`userMessages/${this.auth_id.id}/${user.id}`);
                axios.get(`userMessages/${this.auth_id.id}/${user.id}`).then(response => {
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
        }

    }
</script>

<style scoped>

</style>
