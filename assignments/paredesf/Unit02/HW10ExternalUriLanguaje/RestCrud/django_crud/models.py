from django.db import models

# Create your models here.

class Employee(models.Model):
    _id = models.CharField(max_length=10)
    fullname = models.CharField(max_length=40)
    mobile = models.CharField(max_length=10)
    email = models.CharField(max_length=40)
    address = models.CharField(max_length=40)