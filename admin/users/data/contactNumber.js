// Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter, errMsg) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
      textbox.addEventListener(event, function(e) {
        if (inputFilter(this.value)) {
          // Accepted value
          if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
            this.classList.remove("input-error");
            this.setCustomValidity("");
          }
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          // Rejected value - restore the previous one
          this.classList.add("input-error");
          this.setCustomValidity(errMsg);
          this.reportValidity();
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          // Rejected value - nothing to restore
          this.value = "";
        }
      });
    });
  }
  
  
  // Install input filters.
  setInputFilter(document.getElementById("Contactno"), function(value) {
    return /^-?\d*$/.test(value); }, "Must be valid number");

    function limit(element)
    {

      if(element.value.startsWith("046")){

        var max_chars = 10; //for telephone cavite area
        
        if(element.value.length > max_chars) {
          element.value = element.value.substr(0, max_chars);
          document.getElementById("forNumber").disabled = true;
        }
        else if(element.value.length < max_chars){
          document.getElementById("forNumber").disabled = true;
        }
        else if(element.value.length == max_chars){
          document.getElementById("forNumber").disabled = false;
        }
      }
      else if(element.value.startsWith("09")){
      
        var max_chars = 11; //for mobile starts with 09 input
        
        if(element.value.length > max_chars) {
          element.value = element.value.substr(0, max_chars);
          document.getElementById("forNumber").disabled = true;
        }
        else if(element.value.length < max_chars){
          document.getElementById("forNumber").disabled = true;
        }
        else if(element.value.length == max_chars){
          document.getElementById("forNumber").disabled = false;
        }
      }
      else if(element.value.startsWith("9")){
      
        var max_chars = 10; //for mobile starts with 9 input
        
        if(element.value.length > max_chars) {
          element.value = element.value.substr(0, max_chars);
          document.getElementById("forNumber").disabled = true;
        }
        else if(element.value.length < max_chars){
          document.getElementById("forNumber").disabled = true;
        }
        else if(element.value.length == max_chars){
          document.getElementById("forNumber").disabled = false;
        }
      }
      else if(element.value.startsWith("63")){
      
        var max_chars = 12; //for mobile starts with 63 input
        
        if(element.value.length > max_chars) {
          element.value = element.value.substr(0, max_chars);
          document.getElementById("forNumber").disabled = true;
        }
        else if(element.value.length < max_chars){
          document.getElementById("forNumber").disabled = true;
        }
        else if(element.value.length == max_chars){
          document.getElementById("forNumber").disabled = false;
        }
      }
      else{
        document.getElementById("forNumber").disabled = true;
      }    

    }  
