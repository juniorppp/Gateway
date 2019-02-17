// ADD THE char TO LEFT/RIGHT OF STRING
String.prototype.pad = function(len, char, left){
    char = char || 0;
    left = left || 0;
    var value = this.toString();
    while(value.length < len){
        var r = [
            char+value,
            value+char,
        ];
        value = r[left];
    }
    return value;
}

// ADD THE char TO LEFT OF STRING
String.prototype.lpad = function(len, char){
    return this.pad(len, char, 0);
}




// date.toDate('dd/mm/yyyy hh:ii:ss');
// CONVERT DATE TO STRING BY FOLLOW THE MASK PASSED
Date.prototype.toDate = function(mask){
    var value = {
        D : this.getDate().toString().lpad(2),
        M : (+this.getMonth()+1).toString().lpad(2),
        Y : this.getFullYear().toString().lpad(4),

        H : this.getHours().toString().lpad(2),
        I : this.getMinutes().toString().lpad(2),
        S : this.getSeconds().toString().lpad(2),
    }

    for(var i in value){
        var r = new RegExp(i, 'ig');
        var len = (mask.match(r) || []).length;
        if(len > 0){
            r = new RegExp(i+'+', 'ig');
            var replace = value[i];
            mask = mask.replace(r, replace);
        }
    }
    return mask;
}



function MudarStatusBanco(args){
	//console.log(args);
						
	$.post("../AtualizaDados.php",args, function(x){
					//return true;		
		});
		
}