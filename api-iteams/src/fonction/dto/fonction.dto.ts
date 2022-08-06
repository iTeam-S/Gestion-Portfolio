import { ApiProperty } from "@nestjs/swagger";

export class FonctionCreateDto {
    @ApiProperty()
    id_poste: number;
}

export class FonctionUpdateDto {
    @ApiProperty()
    id: number;

    @ApiProperty()
    id_poste: number;
}
