import {Injectable} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Field} from './field';

@Injectable()
export class HttpService{

    constructor(private http: HttpClient){ }

    getToken() {
        let token = document.querySelector('meta[property="csrf-token"]')['content'];
        return token;
    }

    postData(field: Field, fileToUpload:File){
        const formData: FormData = new FormData();
        const myHeaders = new HttpHeaders().set('X-CSRF-TOKEN', this.getToken())
            .set('Cache-Control', 'no-cache');
        formData.append('file', fileToUpload, fileToUpload.name);
        formData.append('email', field.email);
        formData.append('description', field.description);
        //return this.http.post('http://127.0.0.1/test-frontend/test-frontend.php', formData);
        return this.http.post('/addfile', formData, {headers:myHeaders});
    }
}
