import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule }   from '@angular/forms';
import { AppComponent }   from './app.component';
import { Ng2FileSizeModule } from 'ng2-file-size';

import { HttpClientModule }   from '@angular/common/http';


@NgModule({
    imports:      [ BrowserModule, FormsModule, HttpClientModule,Ng2FileSizeModule, ],
    declarations: [ AppComponent ],
    bootstrap:    [ AppComponent ]
})
export class AppModule { }