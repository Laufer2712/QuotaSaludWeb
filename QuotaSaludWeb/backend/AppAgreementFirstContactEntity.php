<?php
namespace QuotaSaludWeb\Backend;
use DateTime;
use JsonSerializable;
use Exception;

/**
 * Entidad que representa el primer contacto y los datos de captación de un centro
 * o profesional de la salud (Aliado Potencial).
 */
class AppAgreementFirstContactEntity implements JsonSerializable
{
    // -------------------------------------------------------------------
    // PROPIEDADES (Type Hints y Nullable)
    // -------------------------------------------------------------------
    
// -------------------------------------------------------------------
    // PROPIEDADES (Comentarios Cortos)
    // -------------------------------------------------------------------

    private int $id = 0; // Identificador único del registro (BIGINT)
    
    // DATOS DE CONTACTO
    private ?string $name = null; // Nombre del contacto o representante
    private ?string $lastName = null; // Apellido del contacto
    private ?string $phone = null; // Número de teléfono (VARCHAR 50)
    private ?string $email = null; // Correo electrónico del contacto
    private ?string $mainRole = null; // Cargo o función principal
    private ?int $healthSector = null; // Código del Sector de la Salud
    private ?string $approximateBilling = null; // Facturación aproximada (DECIMAL / string)
    private ?string $socialMedia = null; // Red social principal
    private ?int $numberOfBranches = null; // Número de sucursales (BIGINT)
    private ?int $numberOfWorkers = null; // Cantidad de trabajadores (BIGINT)

    // UBICACIÓN
    private ?string $locationAddress = null; // Dirección completa (LONGTEXT)
    private ?string $mapsLink = null; // Link a Google Maps (LONGTEXT)

    // CUESTIONARIO
    private ?int $usesBillingSystem = null; // Usa sistema de facturación (1=Sí, 0=No)
    private ?string $billingSystemName = null; // Nombre del sistema de facturación
    private ?int $billingSystemAdaptable = null; // Sistema adaptable a nuevos pagos (1=Sí, 0=No)
    private ?string $legalFigure = null; // Figura legal ('Sociedad' o 'Persona natural')
    private ?string $rifNumber = null; // Número de RIF (Sociedad)
    private ?string $ciNumber = null; // Cédula de Identidad (Persona natural)
    private ?int $deliversFiscalInvoice = null; // Entrega factura fiscal (1=Sí, 0=No)
    private ?int $termsAccepted = null; // Aceptación de Términos y Condiciones (1=Aceptado, 0=No)

    // ARCHIVOS Y METADATOS
    private ?string $documentRifCiPath = null; // Ruta del archivo adjunto (RIF/CI)
    private ?DateTime $createdAt = null; // Fecha y hora de registro (DATETIME)
    // -------------------------------------------------------------------
    // CONSTRUCTOR (Útil para inicializar la entidad desde un array de datos)
    // -------------------------------------------------------------------

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->fromArray($data);
        }
    }

    // -------------------------------------------------------------------
    // MÉTODOS DE DESERIALIZACIÓN (De JSON/Array a Objeto)
    // -------------------------------------------------------------------

    /**
     * Convierte un array de datos (típicamente de json_decode) en una instancia de la entidad.
     */
    public function fromArray(array $data): self
    {
        // Se utiliza array_key_exists para que acepte valores null
        if (array_key_exists('id', $data)) $this->setId((int)$data['id']);
        if (array_key_exists('name', $data)) $this->setName($data['name']);
        if (array_key_exists('lastName', $data)) $this->setLastName($data['lastName']);
        if (array_key_exists('phone', $data)) $this->setPhone($data['phone']);
        if (array_key_exists('email', $data)) $this->setEmail($data['email']);
        if (array_key_exists('mainRole', $data)) $this->setMainRole($data['mainRole']);
        if (array_key_exists('healthSector', $data)) $this->setHealthSector($data['healthSector']);
        if (array_key_exists('approximateBilling', $data)) $this->setApproximateBilling($data['approximateBilling']);
        if (array_key_exists('socialMedia', $data)) $this->setSocialMedia($data['socialMedia']);
        if (array_key_exists('numberOfBranches', $data)) $this->setNumberOfBranches($data['numberOfBranches']);
        if (array_key_exists('numberOfWorkers', $data)) $this->setNumberOfWorkers($data['numberOfWorkers']);
        if (array_key_exists('locationAddress', $data)) $this->setLocationAddress($data['locationAddress']);
        if (array_key_exists('mapsLink', $data)) $this->setMapsLink($data['mapsLink']);
        if (array_key_exists('usesBillingSystem', $data)) $this->setUsesBillingSystem($data['usesBillingSystem']);
        if (array_key_exists('billingSystemName', $data)) $this->setBillingSystemName($data['billingSystemName']);
        if (array_key_exists('billingSystemAdaptable', $data)) $this->setBillingSystemAdaptable($data['billingSystemAdaptable']);
        if (array_key_exists('legalFigure', $data)) $this->setLegalFigure($data['legalFigure']);
        if (array_key_exists('rifNumber', $data)) $this->setRifNumber($data['rifNumber']);
        if (array_key_exists('ciNumber', $data)) $this->setCiNumber($data['ciNumber']);
        if (array_key_exists('deliversFiscalInvoice', $data)) $this->setDeliversFiscalInvoice($data['deliversFiscalInvoice']);
        if (array_key_exists('termsAccepted', $data)) $this->setTermsAccepted($data['termsAccepted']);
        if (array_key_exists('documentRifCiPath', $data)) $this->setDocumentRifCiPath($data['documentRifCiPath']);
        if (array_key_exists('createdAt', $data)) $this->setCreatedAt($data['createdAt']);
        
        return $this;
    }

    /**
     * Crea una instancia de la entidad a partir de una cadena JSON (equivalente a "for json").
     * @param string $jsonString La cadena JSON a deserializar.
     * @return self
     */
    public static function fromJson(string $jsonString): self
    {
        $data = json_decode($jsonString, true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
            throw new Exception("Error al decodificar JSON o el JSON no es un objeto válido.");
        }
        return new self($data);
    }

    // -------------------------------------------------------------------
    // SERIALIZACIÓN (De Objeto a Array/JSON - jsonSerialize)
    // -------------------------------------------------------------------

    /**
     * Especifica qué datos deben serializarse a JSON (implementación de JsonSerializable).
     * Es el equivalente práctico a la serialización de Java a JSON (toJson).
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastName' => $this->lastName,
            'phone' => $this->phone,
            'email' => $this->email,
            'mainRole' => $this->mainRole,
            'healthSector' => $this->healthSector,
            'approximateBilling' => $this->approximateBilling,
            'socialMedia' => $this->socialMedia,
            'numberOfBranches' => $this->numberOfBranches,
            'numberOfWorkers' => $this->numberOfWorkers,
            'locationAddress' => $this->locationAddress,
            'mapsLink' => $this->mapsLink,
            'usesBillingSystem' => $this->usesBillingSystem,
            'billingSystemName' => $this->billingSystemName,
            'billingSystemAdaptable' => $this->billingSystemAdaptable,
            'legalFigure' => $this->legalFigure,
            'rifNumber' => $this->rifNumber,
            'ciNumber' => $this->ciNumber,
            'deliversFiscalInvoice' => $this->deliversFiscalInvoice,
            'termsAccepted' => $this->termsAccepted,
            'documentRifCiPath' => $this->documentRifCiPath,
            // Formatear la fecha para que sea legible en JSON
            'createdAt' => $this->createdAt ? $this->createdAt->format('Y-m-d H:i:s') : null, 
        ];
    }
    
    // -------------------------------------------------------------------
    // GETTERS Y SETTERS
    // -------------------------------------------------------------------

    public function getId(): int { return $this->id; }
    public function setId(int $id): self { $this->id = $id; return $this; }

    public function getName(): ?string { return $this->name; }
    public function setName(?string $name): self { $this->name = $name; return $this; }

    public function getLastName(): ?string { return $this->lastName; }
    public function setLastName(?string $lastName): self { $this->lastName = $lastName; return $this; }

    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(?string $phone): self { $this->phone = $phone; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(?string $email): self { $this->email = $email; return $this; }

    public function getMainRole(): ?string { return $this->mainRole; }
    public function setMainRole(?string $mainRole): self { $this->mainRole = $mainRole; return $this; }

    public function getHealthSector(): ?int { return $this->healthSector; }
    public function setHealthSector(?int $healthSector): self { $this->healthSector = $healthSector; return $this; }

    /** Retorna la facturación aproximada como string para mantener la precisión de BigDecimal. */
    public function getApproximateBilling(): ?string { return $this->approximateBilling; }
    public function setApproximateBilling(?string $approximateBilling): self { $this->approximateBilling = $approximateBilling; return $this; }

    public function getSocialMedia(): ?string { return $this->socialMedia; }
    public function setSocialMedia(?string $socialMedia): self { $this->socialMedia = $socialMedia; return $this; }

    public function getNumberOfBranches(): ?int { return $this->numberOfBranches; }
    public function setNumberOfBranches(?int $numberOfBranches): self { $this->numberOfBranches = $numberOfBranches; return $this; }

    public function getNumberOfWorkers(): ?int { return $this->numberOfWorkers; }
    public function setNumberOfWorkers(?int $numberOfWorkers): self { $this->numberOfWorkers = $numberOfWorkers; return $this; }

    public function getLocationAddress(): ?string { return $this->locationAddress; }
    public function setLocationAddress(?string $locationAddress): self { $this->locationAddress = $locationAddress; return $this; }

    public function getMapsLink(): ?string { return $this->mapsLink; }
    public function setMapsLink(?string $mapsLink): self { $this->mapsLink = $mapsLink; return $this; }

    public function getUsesBillingSystem(): ?int { return $this->usesBillingSystem; }
    public function setUsesBillingSystem(?int $usesBillingSystem): self { $this->usesBillingSystem = $usesBillingSystem; return $this; }

    public function getBillingSystemName(): ?string { return $this->billingSystemName; }
    public function setBillingSystemName(?string $billingSystemName): self { $this->billingSystemName = $billingSystemName; return $this; }

    public function getBillingSystemAdaptable(): ?int { return $this->billingSystemAdaptable; }
    public function setBillingSystemAdaptable(?int $billingSystemAdaptable): self { $this->billingSystemAdaptable = $billingSystemAdaptable; return $this; }

    public function getLegalFigure(): ?string { return $this->legalFigure; }
    public function setLegalFigure(?string $legalFigure): self { $this->legalFigure = $legalFigure; return $this; }

    public function getRifNumber(): ?string { return $this->rifNumber; }
    public function setRifNumber(?string $rifNumber): self { $this->rifNumber = $rifNumber; return $this; }

    public function getCiNumber(): ?string { return $this->ciNumber; }
    public function setCiNumber(?string $ciNumber): self { $this->ciNumber = $ciNumber; return $this; }

    public function getDeliversFiscalInvoice(): ?int { return $this->deliversFiscalInvoice; }
    public function setDeliversFiscalInvoice(?int $deliversFiscalInvoice): self { $this->deliversFiscalInvoice = $deliversFiscalInvoice; return $this; }

    public function getTermsAccepted(): ?int { return $this->termsAccepted; }
    public function setTermsAccepted(?int $termsAccepted): self { $this->termsAccepted = $termsAccepted; return $this; }

    public function getDocumentRifCiPath(): ?string { return $this->documentRifCiPath; }
    public function setDocumentRifCiPath(?string $documentRifCiPath): self { $this->documentRifCiPath = $documentRifCiPath; return $this; }

    public function getCreatedAt(): ?DateTime { return $this->createdAt; }

    /**
     * Establece la fecha de creación. Acepta objeto DateTime o string (que intenta convertir).
     * @param DateTime|string|null $createdAt 
     */
    public function setCreatedAt($createdAt): self
    {
        if ($createdAt instanceof DateTime) {
            $this->createdAt = $createdAt;
        } elseif (is_string($createdAt) && !empty($createdAt)) {
            try {
                // Intenta crear un objeto DateTime a partir de la cadena
                $this->createdAt = new DateTime($createdAt);
            } catch (Exception $e) {
                $this->createdAt = null; 
            }
        } else {
            $this->createdAt = null;
        }
        return $this;
    }
}