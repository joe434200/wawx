/**
 * 
 */
function ObjectToJSON(o){
    if(o == null)
        return "null";

    switch(o.constructor) {
        case String:
            var s = o; // .encodeURI();
            s = '"' + s.replace(/(["\\])/g, '\\$1') + '"';
            s = s.replace(/\n/g,"\\n");
            s = s.replace(/\r/g,"\\r");
            return s;
        case Array:
            var v = [];
            for(var i=0; i<o.length; i++)
                v.push(_ToJSON(o[i])) ;
            return "[" + v.join(", ") + "]";
        case Number:
            return isFinite(o) ? o.toString() : ObjectToJSON(null);
        case Boolean:
            return o.toString();
        case Date:
            var d = new Object();
            d.__type = "System.DateTime";
            d.Year = o.getUTCFullYear();
            d.Month = o.getUTCMonth() +1;
            d.Day = o.getUTCDate();
            d.Hour = o.getUTCHours();
            d.Minute = o.getUTCMinutes();
            d.Second = o.getUTCSeconds();
            d.Millisecond = o.getUTCMilliseconds();
            d.TimezoneOffset = o.getTimezoneOffset();
            return ObjectToJSON(d);
        default:
            if(o["ObjectToJSON"] != null && typeof o["ObjectToJSON"] == "function")
                return o.ObjectToJSON();
            if(typeof o == "object") {
                var v=[];
                for(attr in o) {
                    if(typeof o[attr] != "function")
                        v.push('"' + attr + '": ' + ObjectToJSON(o[attr]));
                }

                if(v.length>0)
                    return "{" + v.join(", ") + "}";
                else
                    return "{}";        
            }
            return o.toString();
    }
};