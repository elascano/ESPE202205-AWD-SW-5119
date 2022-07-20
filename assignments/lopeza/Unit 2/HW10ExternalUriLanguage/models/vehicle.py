from optparse import Option
from typing import Optional
from pydantic import BaseModel

class Vehicle(BaseModel):
    id: Optional[str]
    plateId: str
    brand: str
    model: str
    year: int 