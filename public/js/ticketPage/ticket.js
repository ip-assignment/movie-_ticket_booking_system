const menuToggle = document.getElementById("menuToggle");
const exitButton = document.getElementById("exit");
const ticketNum = document.getElementById("ticketNum");
const inputC = document.getElementById("inputC");
const bg = document.getElementById("menu");

const schedule =document.getElementById("schedule")
const seat = document.getElementsByClassName("seat")
const type = document.getElementById('type')

const paybg = document.getElementById("payBG");
const confirm = document.getElementById("confirm");
const can = document.getElementById("can");

const RTname = document.getElementById("RTname");
const amount = document.getElementById("amount");

const hiddenP = document.getElementById("hiddenP");
var price

confirm.addEventListener('click', ()=>{
  var checkArray = []
  for (let index = 0; index < seat.length; index++) {
    const element = seat[index];
    if(checkArray.indexOf(element.value) == -1){
      checkArray.push(element.value)
    }else{
      alert("you cant choose a seat more than once.")
      return
    }
  }
  RTname.value = ticketNum.value
  amount.value = price * ticketNum.value
  paybg.style.display = "flex"
})
can.addEventListener('click', ()=>{
  paybg.style.display = "none"
})

function genInput(num){
  var html = ""
  for (let index = 0; index < num; index++) {
    html += `<div class="row">
              <div>
                <label for="">Seat</label>
                <select name="seat${index}" class="seat">
                </select>
              </div>
            </div>`;
  }
  inputC.innerHTML = html
  populateOptions()
  
}

const at = {
  name:"asdf"
}

function populateOptions(){
  console.log(schedule.value, type.value)
  axios.post("http://localhost/movie/util/output.php",{
    id:schedule.value,
    type:type.value
  },{
    headers: {
        'Content-Type': 'application/json'
    }
}).then((Data)=>{
    const data = Data.data
    price = parseInt(data[0]["S_price"]);
    hiddenP.value = price
    console.log(seat)
    for (let index = 0; index < seat.length; index++) {
      var html = ""
      const element = seat[index];
      for (let index = 0; index < data.length; index++) {
        const sName = data[index];
        html += `<option value="${parseInt(sName['S_id'])}">${sName['S_name']}</option>`;
      }
      element.innerHTML = html
    }
    
  }).catch(err=>{
    console.log(err);
  });
}

schedule.addEventListener('change', ()=>{
  populateOptions()
})
type.addEventListener('change', ()=>{
  populateOptions()
})

menuToggle.addEventListener("click", (e) => {
  bg.style.display = "flex";
});
exitButton.addEventListener("click", () => {
  bg.style.display = "none";
});

ticketNum.addEventListener('change', (e)=>{
  genInput(e.target.value)
})
genInput(1)
