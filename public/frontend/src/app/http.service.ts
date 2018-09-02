import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Field} from './field';

@Injectable()
export class HttpService{

    constructor(private http: HttpClient){ }

    postData(field: Field, fileToUpload:File){
        const formData: FormData = new FormData();
        formData.append('file', fileToUpload, fileToUpload.name);
        formData.append('email', field.email);
        formData.append('description', field.description);
        //return this.http.post('http://127.0.0.1/test-frontend/test-frontend.php', formData);
        return this.http.post('/addfile', formData);
    }
}
