
function ServerStatusTable(options){
    this.endpoint = 'http://cs4vn.herokuapp.com/SourceQuery';

    this.inforTemplate= _.template(options.infoTemplate);
    this.infoContainer= options.infoContainer;

    this.playersTemplate= _.template(options.playersTemplate);
    this.playersContainer= options.playersContainer;

    this.onError = options.onError || function(){};
    this.beforeSend = options.beforeSend || function(){};
    this.always = options.always || function(){};

    this.ip = options.ip;
    this.port = options.port;
    this.appid = options.appIp;
}

ServerStatusTable.prototype.start = function(){

}

ServerStatusTable.prototype.update = function(){
    var self = this;
    $.ajax({
        url: this.endpoint,
        type: "post",
        crossDomain:true,
        data: {
            serverIp: this.ip,
            port:  this.port,
            appid: this.appid,
        },
        beforeSend:function(){
            self.beforeSend.call();
        },
        success: function (result) {
            if(result.success){
                self.infoContainer.html(self.inforTemplate(result.data.info));
                var players = {players:result.data.players};
                self.playersContainer.html(self.playersTemplate(players));
            }else{
                self.onError.call();
            }
        }
    }).always(function(){
        self.always.call();
    }).fail(function(){
        self.onError.call();
    });
};
