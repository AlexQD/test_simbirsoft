import { Component} from '@angular/core';
import { HttpService} from './http.service';
import {Field} from './field';

@Component({
    selector: 'my-app',
    templateUrl: './app.component.html',
    providers: [HttpService]
})
export class AppComponent {

    fileToUpload: File = null;
    handleFileInput(files: FileList) {
        this.fileToUpload = files.item(0);
    }

    field: Field=new Field(); // данные вводимого пользователя
    receivedData: {}; //полученные данные от сервера

    done: boolean = false;
    constructor(private httpService: HttpService){}
    submit(field: Field){
        this.httpService.postData(field,this.fileToUpload)
            .subscribe(
                (data: Field) => {this.receivedData=data;this.done=true;},
                error => {console.log(error); console.log('ошибка')}
                //error => {this.receivedData="Ошибка отправки файла"}
            );
    }
}
