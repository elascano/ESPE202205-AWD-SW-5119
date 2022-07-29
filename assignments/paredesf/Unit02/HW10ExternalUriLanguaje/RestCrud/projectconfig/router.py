from rest_framework import routers

from django_crud.viewsets import EmployeeViewset

router = routers.DefaultRouter()
router.register('employee', EmployeeViewset)
