<div class="message-wrapper">
               <ul class="messages">
                   @foreach($messages->all() as $message )
                        <li class="message clearfix">
                        
                        <div class="{{($message->from==Auth()->user()->id)?'sent':'received'}}">
                             <p>{{$message->message}}</p>
                             
                           </div>
                    
                        </li>
                    @endforeach

                    {{$messages->last()->created_at}}
                  
               </ul>
           </div>
         
               
           <div class="input-text">
               <input type="text" name="message" class="submit form-control">
           </div>
           