import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Cookie } from 'ng2-cookies/ng2-cookies';

import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/toPromise';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { HttpErrorResponse, HttpParams } from '@angular/common/http';
//import { Observable } from 'rxjs';
//import { Observable } from 'rxjs';


@Injectable()
export class AppService{
  signupFunction(data: { firstName: any; lastName: any; mobile: any; email: any; password: any; apiKey: any; }) {
    throw new Error("Method not implemented.");
  }

  private url = 'https://chatapi.edwisor.com';
  constructor(public http: HttpClient) {}
public SignupFunction(data): Observable<any> {
const params = new HttpParams()
  .set('firstname', data.firstName)
  .set('lastname', data.lastName)
  .set('mobile', data.mobile)
  .set('email', data.email)
  .set('password', data.password)
  .set('apiKey', data.apiKey)
return this.http.post('${this.url}/api/v1/users/signup  ', params);
} //end of signupFunction function

public signinFunction(data): Observable<any> {
  const params = new HttpParams()
  .set('email', data.email)
  .set('password', data.password)

  return this.http.post('${this.url}/api/v1/users/login  ', params);
} //end of signinFunction functon


private handleErrror(err: HttpErrorResponse){
  let errorMessage = '';
  if(err.error instanceof Error){
    errorMessage = 'An error occured: ${err.error.message}';
  }
}


}




