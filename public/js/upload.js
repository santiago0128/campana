document.querySelectorAll("[type='file']")
  .forEach(function(control){
  control.addEventListener('change',function(ev){
    console.log(this.id);
    document.querySelector("[for='"+this.id+"']")
            .innerHTML = ev.target.files[0].name;
  });
});
