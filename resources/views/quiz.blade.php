<div class="col-12 title">Quiz</div>
    <div class=" card quiz">        
                <form>        
                    <div class="col-12 question">Aby rozpocząć quiz naciśnij "rozpocznij"</div>                    
                    <div class=" inputs"></div>                   
                    <button class="quiz-btn btn ">Rozpocznij!</button>                    
                </form>        
            </div> <div class="response"></div>                     
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
        const questionDiv = document.querySelector('.question'); 
        const questions = @json($quiz);
        let pos = [{{$userq->pos}}];
        let etap = 0;
        const scores = @json($userq);
        let score = scores['quiz'];
        let choice;
        const div = document.querySelector('.inputs');         
        const scoreField = document.querySelector('.score');
        const tryField = document.querySelector('.try');
        const btn = document.querySelector('.quiz-btn');
        // losowanie bez powtórzeń
        let randomNumber = Math.floor(Math.random()*questions.length); console.log('przed'+ randomNumber);        
            for (let i = 0; i < pos.length;i++) {
                console.log(pos[i] === randomNumber);
                if (pos[i] === randomNumber) {
                     randomNumber = Math.floor(Math.random()*questions.length);
                    i=0;
                }
               console.log(i);                
            }
            console.log('po'+ randomNumber);      
        pos.push(randomNumber); console.log(pos);
           //funkcja wyświetlania pytań
            btn.addEventListener('click', (e)=>{
                e.preventDefault();            
                console.log(pos == questions.length);
            if (pos.length == questions.length || pos.length >= 30 || score >= 30) {
                btn.style.display= "none";
                questionDiv.textContent="";
                div.textContent = `Nie ma już wiecej pytań :(`;
            } else if (etap=== 0) {
                div.innerHTML = `<input class=""  type="radio" name="choices" id="1" value="1" checked><span class="odp1"></span><input class="" type="radio" name="choices" id="2" value="2"><span class="odp2"></span><input  class="" type="radio" name="choices" id="3" value="3"><span class="odp3"></span><input class="" type="radio" name="choices" id="4" value="4"><span class="odp4"></span> `;
                const input1 = document.getElementById('1');
                const input2 = document.getElementById('2');
                const input3 = document.getElementById('3');
                const input4 = document.getElementById('4');
                const span1 = document.querySelector('.odp1');
                const span2 = document.querySelector('.odp2');
                const span3 = document.querySelector('.odp3');
                const span4 = document.querySelector('.odp4');          

                    questionDiv.textContent = questions[randomNumber]['question']; console.log(questions[randomNumber]['question']);
                    span1.textContent = questions[randomNumber]['ans1'];
                    span2.textContent = questions[randomNumber]['ans2'];
                    span3.textContent = questions[randomNumber]['ans3'];
                    span4.textContent = questions[randomNumber]['ans4'];
                    btn.textContent = "Odpowiedz!";              
                } else {
                    const choices = document.getElementsByName("choices");
                                
             for(var i=0; i<choices.length; i++){
                 if(choices[i].checked){
                     choice = choices[i].value;                     
                 }
             }
            console.log(questions[randomNumber]['cans']);
            if(choice == questions[randomNumber]['cans']){                
                score += 1;
                btn.style.display= "none";
                questionDiv.textContent="";
                div.textContent = `Odpowiedź poprawna! Otrzymujesz kolejny punkt! Razem masz już ${score} pkt. !`             
            // wysłanie pos i dodanie punktu do sql
            let data;
            $.post({
                url: '../resources/views/ajax.blade.php',
                type: 'post',
                data:{ id: {{$userq->id}},
                addPos: pos } ,
                success: function(data){                    
                }
            });                 
            } else {
                let odp;
                if (questions[randomNumber]['cans']==1) {
                    odp = 'a';
                } else if(questions[randomNumber]['cans']==2){
                    odp = 'b';
                }else if(questions[randomNumber]['cans']==3){
                    odp = 'c';
                }else {
                    odp = 'd';
                }
                 btn.style.display= "none";
                 questionDiv.textContent="";
                 div.textContent=` Niestety tym razem się nie udało. Poprawna odpowiedź to ${odp.toUpperCase()}. Nie martw się masz jeszcze wiele pytań! :)`;
                 let data;
                //  wysłanie pos do sql
                $.post({
                url: '../resources/views/ajaxpos.blade.php',
                type: 'post',
                data:{ id: {{$userq->id}},
                addPos: pos } ,
                success: function(data){                
                }
            });
        }
        }           
    etap++;            
})
</script>
            


