package works.weave.socks.broker.controllers;

import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.RestController;

import works.weave.socks.broker.items.ItemClass;
import works.weave.socks.broker.payment.Payment;


@RestController
public class BrokerController {

  @ResponseStatus(HttpStatus.OK)
  @RequestMapping(value = "/get", produces = MediaType.APPLICATION_JSON_VALUE, method = RequestMethod.GET)
  public String get() {
    //Call item module for getting the items.
    String items = ItemClass.getItems();
    return items;
  }

  @ResponseStatus(HttpStatus.OK)
  @RequestMapping(value = "/payment/{total}", produces = MediaType.APPLICATION_JSON_VALUE, method = RequestMethod.GET)
  public String payment(@PathVariable String total) {
    //Call the payment module for processing the request.
    String paymentStatus = Payment.paymentProcess(total);
    return paymentStatus;
  }
}
